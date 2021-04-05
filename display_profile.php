<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Profile - HomesInfra</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
    </head>

    <body id="page-top">
        <div id="wrapper">
            <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                        <div class="sidebar-brand-text mx-3"><span>HomesInfra</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="nav navbar-nav text-light" id="accordionSidebar">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.html"><i
                                    class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="edit_profile.html"><i
                                    class="fas fa-user"></i><span>Profile</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="table.html"><i
                                    class="fas fa-table"></i><span>Table</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="login.html"><i
                                    class="far fa-user-circle"></i><span>Login</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="register.html"><i
                                    class="fas fa-user-circle"></i><span>Register</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="forgot-password.html"><i
                                    class="fas fa-key"></i><span>Forgotten Password</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="404.html"><i
                                    class="fas fa-exclamation-circle"></i><span>Page Not Found</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="favlist.html"><i
                                    class="fas fa-window-maximize"></i><span>Blank Page</span></a></li>
                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                            id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3"
                                id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                            <form
                                class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                        placeholder="Search for ...">
                                    <div class="input-group-append"><button class="btn btn-primary py-0"
                                            type="button"><i class="fas fa-search"></i></button></div>
                                </div>
                            </form>
                            <ul class="nav navbar-nav flex-nowrap ml-auto">
                                <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                        data-toggle="dropdown" aria-expanded="false" href="#"><i
                                            class="fas fa-search"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                                        aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto navbar-search w-100">
                                            <div class="input-group"><input class="bg-light form-control border-0 small"
                                                    type="text" placeholder="Search for ...">
                                                <div class="input-group-append"><button class="btn btn-primary py-0"
                                                        type="button"><i class="fas fa-search"></i></button></div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            data-toggle="dropdown" aria-expanded="false" href="#"><span
                                                class="badge badge-danger badge-counter">3+</span><i
                                                class="fas fa-bell fa-fw"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                            role="menu">
                                            <h6 class="dropdown-header">alerts center</h6>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="mr-3">
                                                    <div class="bg-primary icon-circle"><i
                                                            class="fas fa-file-alt text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 12, 2019</span>
                                                    <p>A new monthly report is ready to download!</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="mr-3">
                                                    <div class="bg-success icon-circle"><i
                                                            class="fas fa-donate text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 7, 2019</span>
                                                    <p>$290.29 has been deposited into your account!</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="mr-3">
                                                    <div class="bg-warning icon-circle"><i
                                                            class="fas fa-exclamation-triangle text-white"></i></div>
                                                </div>
                                                <div><span class="small text-gray-500">December 2, 2019</span>
                                                    <p>Spending Alert: We've noticed unusually high spending for your
                                                        account.</p>
                                                </div>
                                            </a><a class="text-center dropdown-item small text-gray-500" href="#">Show
                                                All Alerts</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            data-toggle="dropdown" aria-expanded="false" href="#"><i
                                                class="fas fa-envelope fa-fw"></i><span
                                                class="badge badge-danger badge-counter">7</span></a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                            role="menu">
                                            <h6 class="dropdown-header">alerts center</h6>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                        src="assets/img/avatars/avatar4.jpeg">
                                                    <div class="bg-success status-indicator"></div>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><span>Hi there! I am wondering if you can
                                                            help me with a problem I've been having.</span></div>
                                                    <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                        src="assets/img/avatars/avatar2.jpeg">
                                                    <div class="status-indicator"></div>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><span>I have the photos that you ordered
                                                            last month!</span></div>
                                                    <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                        src="assets/img/avatars/avatar3.jpeg">
                                                    <div class="bg-warning status-indicator"></div>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><span>Last month's report looks great, I
                                                            am very happy with the progress so far, keep up the good
                                                            work!</span></div>
                                                    <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                                </div>
                                            </a>
                                            <a class="d-flex align-items-center dropdown-item" href="#">
                                                <div class="dropdown-list-image mr-3"><img class="rounded-circle"
                                                        src="assets/img/avatars/avatar5.jpeg">
                                                    <div class="bg-success status-indicator"></div>
                                                </div>
                                                <div class="font-weight-bold">
                                                    <div class="text-truncate"><span>Am I a good boy? The reason I ask
                                                            is because someone told me that people say this to all dogs,
                                                            even if they aren't good...</span></div>
                                                    <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                                </div>
                                            </a><a class="text-center dropdown-item small text-gray-500" href="#">Show
                                                All Alerts</a>
                                        </div>
                                    </div>
                                </li>
                                <div class="d-none d-sm-block topbar-divider"></div>
                                <li class="nav-item dropdown no-arrow" role="presentation">
                                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                            data-toggle="dropdown" aria-expanded="false" href="#"><span
                                                class="d-none d-lg-inline mr-2 text-gray-600 small">Valerie
                                                Luna</span><img class="border rounded-circle img-profile"
                                                src="assets/img/avatars/avatar1.jpeg"></a>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"
                                            role="menu"><a class="dropdown-item" role="presentation" href="#"><i
                                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a
                                                class="dropdown-item" role="presentation" href="#"><i
                                                    class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                            <a class="dropdown-item" role="presentation" href="#"><i
                                                    class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity
                                                log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                role="presentation" href="#"><i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="border-white profile-card" style="background-color: rgba(255,255,255,0);">
                            <div class="profile-back" style="background-color: rgb(238,140,69);"></div><img
                                class="rounded-circle img-fluid border rounded profile-pic" src="assets/img/2.jpg">
                            <h3 class="profile-name" style="background-color: rgb(238,140,69);">Lorena Norambuena
                                Rojas&nbsp;<i class="fa fa-check"
                                    style="font-size: 19px;color: rgb(23,99,247);padding-left: 0px;padding-right: 0px;"></i>
                            </h3><button class="btn btn-warning btn-sm" type="button"
                                style="color: rgb(0,0,0);line-height: 18px;">Add as favourite</button>
                            <p class="profile-bio">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                                elementum aliquet ante, non faucibus justo pulvinar sit amet.&nbsp;</p>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-primary"
                                    style="background-color: rgb(255,255,255);"><i class="fa fa-volume-control-phone"
                                        style="font-size: 22px;"></i><span>&nbsp; 8808002227</span><span>&nbsp; &nbsp;<a
                                            class="btn btn-outline-warning active btn-sm bg-info" role="button">Request
                                            No.</a></span></li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Gallery</p>
                            </div>
                            <div c lass="card-body"></div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © HomesInfra 2020</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="assets/js/script.min.js"></script>
        <script src="assets/js/rdjsfile.js"></script>
    </body>

</html>
