<?php
	require( "process/config.php" );
    $user_id = isset( $_GET['id'] ) ? $_GET['id'] : "";
     $connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
						// Check connection
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}




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

                        <h2>Add User</h2>
                        <form class="form-horizontal" method="post" role="form" action="process/insert.php">
                                <div class="form-group">
                                  <label class="control-label col-sm-2">Username</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2">Password</label>
                                  <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                  </div>
                                </div>
							    <div class="form-group">
							      <label class="control-label col-sm-2">Fullname</label>
							      <div class="col-sm-10">
							        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname">
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-2">Role</label>
							      <div class="col-sm-10">
							        <input type="text" class="form-control" id="role" name="role" placeholder="Enter role">
							      </div>
							    </div>
							      <div class="form-group">
							      <label class="control-label col-sm-2">Join date</label>
							      <div class="col-sm-10">
							        <input type="date" class="form-control" id="joindate" name="joindate" value="<?php echo date('YYYY-MM-dd') ?>">
							      </div>
							    </div>
							    <div class="form-group">        
							      <div class="col-sm-offset-2 col-sm-10">
							        <button type="submit" class="btn btn-default">Submit</button>
							      </div>
							    </div>
							  </form>
                    </div>
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