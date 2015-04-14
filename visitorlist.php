<?php 
require( "process/config.php" );


// $user_id = $_GET['id'];
switch($action){
        case 'update':
            header("Location: updateuser.php?id=$user_id");
            // echo "UPDATE";
            // echo "id=".$user_id;
            break;
        case 'delete':
            echo "DELETE";
            break;
}

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
// $sql="SELECT * FROM Checkin";
$sql="SELECT * FROM Visitor WHERE timestamp >= curdate()";


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
                        <h1>Visitor</h1>

                    </div>
                </div>
                <div class="row">


  <?php
                if ($result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                echo    '<div class="col-lg-2 col-md-2">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center">';
                echo '<div class="huge">'.$row['name'].'</div>';
                echo '<div>'.$row['timestamp'].'</div>';

                echo '  </div>
                            </div>
                        </div>
                        <a href="#">
                                <div class="col-xs-12 text-center">
                                <br>';
                                 
                echo '<img src="uploads/'.$row['picture_url'].'" style="height:100px;width:auto;"><br>';
                echo ' <span class="pull-center">
                Company : '.$row["company"].' <br>
                Meet : '.$row["dealer"].' <br>
                For : '.$row["reason"].' <br>
                </span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>';
               
                    }
                }else{
                    echo "No Visitor";
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
