
<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "description" content = "">
        <meta name = "author" content = "">
        <link rel = "shortcut icon" href = "assets/img/logo-fav.png">
        <title>AFI</title>
        <link type = "text/css" rel = "stylesheet" href = "<?php echo LIB . "perfect-scrollbar/css/perfect-scrollbar.min.css"; ?>" />
        <link type = "text/css" rel = "stylesheet" href = "<?php echo LIB . "material-design-icons/css/material-design-iconic-font.min.css"; ?>" />
        <!--[if lt IE 9]>
        <script src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link type="text/css" rel="stylesheet" href="<?php echo LIB . "jquery.vectormap/jquery-jvectormap-1.2.2.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo LIB . "jqvmap/jqvmap.min.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo LIB . "datetimepicker/css/bootstrap-datetimepicker.min.css"; ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo CSS . "style.css"; ?>" />
    </head>
    <body>
        <div class="be-wrapper be-fixed-sidebar">
            <nav class="navbar navbar-default navbar-fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="navbar-header"><a href="index.html" class="navbar-brand"></a>
                    </div>
                    <div class="be-right-navbar">
                        <ul class="nav navbar-nav navbar-right be-user-nav">
                            <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="assets/img/avatar.png" alt="Avatar"><span class="user-name">Túpac Amaru</span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li>
                                        <div class="user-info">
                                            <div class="user-name">Túpac Amaru</div>
                                            <div class="user-position online">Available</div>
                                        </div>
                                    </li>
                                    <li><a href="#"><span class="icon mdi mdi-face"></span> Account</a></li>
                                    <li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>
                                    <li><a href="#"><span class="icon mdi mdi-power"></span> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="page-title"><span>Dashboard</span></div>
                        <ul class="nav navbar-nav navbar-right be-icons-nav">
                            <li class="dropdown"><a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                                <ul class="dropdown-menu be-notifications">
                                    <li>
                                        <div class="title">Notifications<span class="badge">3</span></div>
                                        <div class="list">
                                            <div class="be-scroller">
                                                <div class="content">
                                                    <ul>
                                                        <li class="notification notification-unread"><a href="#">
                                                                <div class="image">
                                                                    <img src="<?php echo IMG . "avatar2.png"; ?>" alt="Avatar">
                                                                </div>
                                                                <div class="notification-info">
                                                                    <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                                                                </div></a></li>
                                                        <li class="notification"><a href="#">
                                                                <div class="image"><img src="<?php echo IMG . "avatar3.png"; ?>" alt="Avatar"></div>
                                                                <div class="notification-info">
                                                                    <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                                                                </div></a></li>
                                                        <li class="notification"><a href="#">
                                                                <div class="image"><img src="<?php echo IMG . "avatar4.png"; ?>" alt="Avatar"></div>
                                                                <div class="notification-info">
                                                                    <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                                                                </div></a></li>
                                                        <li class="notification"><a href="#">
                                                                <div class="image">
                                                                    <img src="<?php echo IMG . "avatar5.png"; ?>" alt="Avatar"></div>
                                                                <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer"> <a href="#">View all notifications</a></div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                                    <span class="icon mdi mdi-apps"></span>
                                </a>
                                <ul class="dropdown-menu be-connections">
                                    <li>
                                        <div class="list">
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-xs-4"><a href="#" class="connection-item">
                                                            <img src="<?php echo IMG . "github.png"; ?>" alt="Github">

                                                            <span>GitHub</span></a></div>
                                                    <div class="col-xs-4"><a href="#" class="connection-item">
                                                            <img src="<?php echo IMG . "bitbucket.png"; ?>" alt="Bitbucket"> 
                                                            <span>Bitbucket</span>
                                                        </a></div>
                                                    <div class="col-xs-4"><a href="#" class="connection-item">
                                                            <img src="<?php echo IMG . "slack.png"; ?>" alt="Slack"> 
                                                            <span>Slack</span></a></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-4"><a href="#" class="connection-item">
                                                            <img src="<?php echo IMG . "Dribbble.png"; ?>" alt="Dribbble"><span>Dribbble</span></a></div>
                                                    <div class="col-xs-4"><a href="#" class="connection-item">
                                                            <img src="<?php echo IMG . "mail_chimp.png"; ?>" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                                                    <div class="col-xs-4"><a href="#" class="connection-item">
                                                            <img src="<?php echo IMG . "dropbox.png"; ?>" alt="Dropbox"><span>Dropbox</span></a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer"> <a href="#">More</a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="be-left-sidebar">
                <div class="left-sidebar-wrapper">
                    <a href="#" class="left-sidebar-toggle">AFI</a>
                    <?php
                    //LEFT SIDE MENU
                    echo $menu;
                    ?>
                </div>
            </div>
            <div class="be-content">
                <?php
                //MAIN CONTAINER BODY
                echo $body;
                ?>
            </div>
        </div>
        <script src="<?php echo LIB . "jquery/jquery.min.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo JS . "main.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "bootstrap/dist/js/bootstrap.min.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jquery-flot/jquery.flot.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jquery-flot/jquery.flot.pie.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jquery-flot/jquery.flot.resize.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jquery-flot/plugins/jquery.flot.orderBars.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jquery-flot/plugins/curvedLines.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jquery.sparkline/jquery.sparkline.min.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "countup/countUp.min.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jquery-ui/jquery-ui.min.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jqvmap/jquery.vmap.min.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo LIB . "jqvmap/maps/jquery.vmap.world.js"; ?>" type="text/javascript"></script>
        <script src="<?php echo JS . "app-dashboard.js"; ?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                //initialize the javascript
                App.init();
                App.dashboard();

            });
        </script>
        <?php
        if ($script != null) {
            echo "<script src='" . LIB . "afi/" . $script . ".js'></script>";
        }
        ?>
    </body>
</html>
