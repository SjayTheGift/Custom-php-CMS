<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Ngunifed</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Ngunified Mag Dashboard</h3>
                    <strong>ND</strong>
                </div>

                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Posts
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="create-post.view.php"><i class="glyphicon glyphicon-edit"></i>Create Post</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>View Posts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            Users
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="create-admin.view.php"><i class="glyphicon glyphicon-edit"></i>Create Admin User</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>View User</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i>View Admin User</a></li>
                        </ul>
                    </li>
                </ul>

            </nav>

            <!-- Page Content Holder -->
            <div class="container">
                <div id="content">

                    <nav class="navbar navbar-default">
                        <div class="container-fluid">

                            <div class="navbar-header">
                                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                    <i class="glyphicon glyphicon-align-left"></i>
                                    <span>Toggle Sidebar</span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="#">Page</a></li>
                                    <li><a href="logout.php">logout <i class="glyphicon glyphicon-off"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <h2>Collapsible Sidebar Using Bootstrap 3</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div class="line"></div>

                    <h2>Lorem Ipsum Dolor</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div class="line"></div>



                </div>


                <footer class="main-footer">
                    <strong>COPYRIGHT &copy; NGUNIFIED STUDIO <i class="ion-heart"></i> Ngunified.co.za</a>.</strong> 2019. ALL RIGHT RESERVED.
                </footer>
            </div>
        </div>






        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
    </body>
</html>
