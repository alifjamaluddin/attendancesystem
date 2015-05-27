<?php 
require( "process/config.php" );

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
// $sql="SELECT * FROM Checkin";
$sql="SELECT c.id, c.picture_url, c.time, p.fullname, c.user_id FROM CheckIn c JOIN Profile p ON (c.user_id = p.user_id) WHERE time >= curdate()";


$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper" class="toggled">

<?php require( "sidebar.php" ); ?>
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"> <i class="fa fa-bars"></i></a>
                        <h1>Attendance</h1>

                    </div>
                </div>
                <div class="row">


  <?php
                $timelimit = date(mktime(9,0,0,12,4,2015));
                if ($result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['user_id'];
                echo    '<div class="col-lg-2 col-md-2">';
                $time =  date( "H:i:s", $row['time']);
                if( $time < $timelimit){
                echo '<div class="panel panel-success">';
            }else{
                echo '<div class="panel panel-warning">';
            }
                echo '<div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center">';
                echo '<div class="huge">'.$row['fullname'].'</div>';
                echo '<div>'.$row['time'].'</div>';

                echo '  </div>
                            </div>
                        </div>
                        <a href="#">
                                <div class="col-xs-12 text-center">
                                <br>';
                                 
                echo '<img src="uploads/'.$row['picture_url'].'jpg" style="height:100px;width:auto;"><br>';
                echo ' <span class="pull-center"><a href="profile.php?id='.$id.'" class="btn btn-primary">View Detail</a></span>
                        </a>
                        <a href="process/delete_worker.php?id='.$row['id'].'" class="btn btn-danger">Delete</a>
                                <div class="clearfix"></div>

                            </div>
                    </div>
                </div>';
               
                    }
                }else{
                    // echo "<tr><td>No result.</td></tr>";
                }
?>


                
                                    

                              
                               

             </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
