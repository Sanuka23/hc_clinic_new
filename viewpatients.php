<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .logout {
                position: absolute;
                top: 10px;
                right: 20px;
            }

            .logout .nav-link {
                background-color: #dc3545; 
                color: white;
                padding: 8px 16px;
                border-radius: 5px;
                text-align: center;
            }

            .logout .nav-link:hover {
                background-color: #c82333; 
            }

            .navbar-nav .nav-item:not(.logout) .nav-link:hover {
                background-color: #0056b3; 
                color: white;
                border-radius: 5px;
            }
    </style>
</head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
    <a class="navbar-brand" href="receptionisthome.php">HC_Clinic</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
                <a class="nav-link" href="receptionisthome.php">Home</a>
            </li>
        </ul>
    </div>
</nav>
    <center>
        <table>
            <thead>
                <th>Patient ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Phone Number</th>
            </thead>
        <?php
        include 'connect.php';

        $sql="SELECT p_id, username, name, dob, address, phone_number FROM patients";
        $result=mysqli_query($conn,$sql);
        if($result){while ($row=mysqli_fetch_assoc($result)){
            $p_id=$row['p_id'];
            $username=$row['username'];
            $name=$row['name'];
            $dob=$row['dob'];
            $address=$row['address'];
            $phone_number=$row['phone_number'];

            echo '<tbody>
                <tr>
                    <td>'.$p_id.'</td>
                    <td>'.$username.'</td>
                    <td>'.$name.'</td>
                    <td>'.$dob.'</td>
                    <td>'.$address.'</td>
                    <td>'.$phone_number.'</td>
                </tr>
                </tdoby>';
            }
        }
        ?>
    
        
        </table>
    </center>

</body>
</html>