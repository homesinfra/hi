<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");
include("includes/classes/Notification.php");
include("includes/classes/FavCreatives.php");

if(isset($_SESSION['mobile_no'])|| isset(($_SESSION['userLoggedIn']))) {
	$mobile_no = $_SESSION['mobile_no'];
    $userLoggedIn = $_SESSION['userLoggedIn'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: otpLogin.php");
}
$result=$con->query("SELECT profile_pic FROM users WHERE username='$userLoggedIn'");
$row = mysqli_fetch_array($result); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>HomesInfra</title>
        <link rel="stylesheet" href="rd/assets/css/main.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js " crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" type="text/css" href="assets/css/mystyles.css">
        <link rel="stylesheet" type="text/css" href="rd/assets/css/styles.min.css">
    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <nav class="navbar navbar-light border align-items-start sidebar sidebar-light accordion bg-light p-0 toggled">
                <div class="container-fluid d-flex flex-column p-0">
                    <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                        <div class="sidebar-brand-icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3"><span>HomesInfra</span></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <ul class="nav navbar-nav text-light" id="accordionSidebar">

                        <li class="nav-item" id="editProfile" role="presentation">
                            <?php
                                
                            // $type_of_creative=$_SESSION['profile'];
                            if ($user['profile']=="architect") {
                                echo "<a class='nav-link' href='architectSettings.php'><i class='fas fa-tachometer-alt'></i><span>Profile Details</span>
                                </a></li>";
                            }elseif ($user['profile']=="interior") {
                                echo "<a class='nav-link' href='interiorDesignerSettings.php'><i class='fas fa-tachometer-alt'></i><span>Profile Details</span>
                                </a></li>";
                            }else{
                                echo "<a class='nav-link' href='customerSettings.php'><i class='fas fa-tachometer-alt'></i><span>Profile Details</span>
                                </a></li>";
                            }
?>
                            <!-- <a class="nav-link" href=""><i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                            </a></li> -->

                        <li class="nav-item favsList" id="favList" role=" presentation">
                            <!-- <a class="nav-link" href="fav_creatives.php"><i class="fas fa-user"></i><span>Favourite
                                    Creatives</span></a> -->
                            <?php
                                
                                // $type_of_creative=$_SESSION['profile'];
                                if ($user['profile']=="architect") {
                                    // echo "<a class='nav-link' href='architectSettings.php'><i class='fas fa-tachometer-alt'></i><span>Dashboard</span>
                                    // </a></li>";
                                }elseif ($user['profile']=="interior") {
                                    // echo "<a class='nav-link' href='interiorDesignerSettings.php'><i class='fas fa-tachometer-alt'></i><span>Dashboard</span>
                                    // </a></li>";
                                }else{
                                    echo "<a class='nav-link' href='fav_creatives.php'><i class='fas fa-user'></i><span>Favourite
                                    Creatives</span></a></li>";
                                }
?>
                        </li>

                        <li class="nav-item" role="presentation">

                            <?php
                            
                        // $type_of_creative=$_SESSION['profile'];
                        if ($user['profile']=="architect") {
                            echo "<a class='nav-link' href='project_mgmt.php'><i class='fas fa-table'></i><span>Upload/Track Poject</span>
                            </a></li>";
                        }elseif ($user['profile']=="interior") {
                            echo "<a class='nav-link' href='project_mgmt.php'><i class='fas fa-table'></i><span>Upload/Track Poject</span>
                            </a></li>";
                        }else{
                            echo "";
                        }
?>
                        </li>

                        <li class="nav-item" role="presentation">
                            <!-- <a class="nav-link" href="uploadGalleryPic.php"> -->
                            <?php
                            
                            // $type_of_creative=$_SESSION['profile'];
                            if ($user['profile']=="architect") {
                                echo "<a class='nav-link' href='uploadGalleryPic.php'><i class='fas fa-table'></i><span>Upload Gallery</span>
                                </a></li>";
                            }elseif ($user['profile']=="interior") {
                                echo "<a class='nav-link' href='uploadGalleryPic.php'><i class='fas fa-table'></i><span>Upload Gallery</span>
                                </a></li>";
                            }else{
                                echo "";
                            }
    ?>

                            <!-- <li class="nav-item" role="presentation"><a class="nav-link" href=""><i
                                    class="fas fa-user-circle"></i><span>Track Project</span></a></li> -->

                            <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="forgot-password.html"><i
                                    class="fas fa-key"></i><span>Forgot Password</span></a></li> -->

                        <li class="nav-item" role="presentation"><a class="nav-link" href="messages.php"><i
                                    class="fas fa-exclamation-circle"></i><span>Messages</span></a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link active" href="logout.php"><i
                                    class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
                    </ul>
                    <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                            id="sidebarToggle" type="button"></button></div>
                </div>
            </nav>
            <!-- End of Sidebar -->
            <?php
              //unread messages
            $messages=new Message($con,$userLoggedIn);
            $num_messages=$messages->getUnreadNumber();  
            ?>
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                        <div class="container-fluid checkTest">
                            <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop"
                                type="button"><i class="fas fa-bars"></i>
                            </button>
                            <div class="search dropdown d-none d-sm-block">
<?php
                                if ($user['profile']=="architect"){                                  
                                                                
                               echo "<form class='ml-md-3 my-2 mw-100 navbar-search' method='GET' action='search.php'
                                    role='search' name='search_form'>

                                    <div class='input-group d-none' >
                                        <!--desktop view search box  -->
                                        <fieldset style='width:300px'>
                                            <div class='toggle'>
                                                <input type='radio' id='cond_new' name='profile' checked='checked'
                                                    value='architect'>
                                                <label title='Select Architect'
                                                    class='p-2 text-center d-block cursor-pointer'
                                                    for='cond_new'>Architect</label>
                                                <input type='radio' id='cond_used' name='profile'
                                                    value='interior designer'>
                                                <label title='Select Interior Designer'
                                                    class='p-2 text-center d-block cursor-pointer'
                                                    for='cond_used'>Interior Designer</label>
                                            </div>
                                        </fieldset>
                                        <input class='bg-light ml-2 form-control border-0 small' id='top-search'
                                            type='text' placeholder='Search Architects/Interior Designers by City'
                                            onkeyup='getExtLiveSearchUsers(this.value)' name='city' autocomplete='off'>
                                        <div class='input-group-append'>
                                            <button class='btn btn-primary py-0 btn-block' type='submit'>
                                                <i class='fas fa-search'></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>";
                            }elseif ($user['profile']=="interior") {
                                echo "<form class='ml-md-3 my-2 mw-100 navbar-search' method='GET' action='search.php'
                                role='search' name='search_form'>

                                <div class='input-group d-none' >
                                    <!--desktop view search box  -->
                                    <fieldset style='width:300px'>
                                        <div class='toggle'>
                                            <input type='radio' id='cond_new' name='profile' checked='checked'
                                                value='architect'>
                                            <label title='Select Architect'
                                                class='p-2 text-center d-block cursor-pointer'
                                                for='cond_new'>Architect</label>
                                            <input type='radio' id='cond_used' name='profile'
                                                value='interior designer'>
                                            <label title='Select Interior Designer'
                                                class='p-2 text-center d-block cursor-pointer'
                                                for='cond_used'>Interior Designer</label>
                                        </div>
                                    </fieldset>
                                    <input class='bg-light ml-2 form-control border-0 small' id='top-search'
                                        type='text' placeholder='Search Architects/Interior Designers by City'
                                        onkeyup='getExtLiveSearchUsers(this.value)' name='city' autocomplete='off'>
                                    <div class='input-group-append'>
                                        <button class='btn btn-primary py-0 btn-block' type='submit'>
                                            <i class='fas fa-search'></i>
                                        </button>
                                    </div>
                                </div>
                            </form>";
                            }else{
                                echo "<form class='ml-md-3 my-2 mw-100 navbar-search' method='GET' action='search.php'
                                role='search' name='search_form'>

                                <div class='input-group'>
                                    <!--desktop view search box  -->
                                    <fieldset style='width:300px'>
                                        <div class='toggle'>
                                            <input type='radio' id='cond_new' name='profile' checked='checked'
                                                value='architect'>
                                            <label title='Select Architect'
                                                class='p-2 text-center d-block cursor-pointer'
                                                for='cond_new'>Architect</label>
                                            <input type='radio' id='cond_used' name='profile'
                                                value='interior designer'>
                                            <label title='Select Interior Designer'
                                                class='p-2 text-center d-block cursor-pointer'
                                                for='cond_used'>Interior Designer</label>
                                        </div>
                                    </fieldset>
                                    <input class='bg-light ml-2 form-control border-0 small' id='top-search'
                                        type='text' placeholder='Search Architects/Interior Designers by City'
                                        onkeyup='getExtLiveSearchUsers(this.value)' name='city' autocomplete='off'>
                                    <div class='input-group-append'>
                                        <button class='btn btn-primary py-0 btn-block' type='submit'>
                                            <i class='fas fa-search'></i>
                                        </button>
                                    </div>
                                </div>
                            </form>";
                            }
                            ?>
                                <!-- Dropdown Menu -->
                                <div
                                    class="profiles-list dropdown-menu dropdown-menu-animated mt-n2 d-block dropdown-lg bg-transparent col-md-6 border-0 search_results">
                                    <!-- Loop from here -->

                                    <!-- Loop till here -->

                                </div>
                            </div>
                            <ul class="nav navbar-nav flex-nowrap ml-auto">
                                <li class="nav-item dropdown search-btn-mobile d-sm-none no-arrow"><a
                                        class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false"
                                        href="#"><i class="fas fa-search">
                                        </i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                                        aria-labelledby="searchDropdown">

                                        <form class="form-inline mr-auto navbar-search w-100" action="search.php"
                                            method="GET" role="search" name="search_form">
                                            <!-- Mobile view search select -->
                                            <div class="row mx-auto">
                                                <div class="col-12">
                                                    <fieldset style="width:290px">
                                                        <p class="text-dark">Select Architect or Interior Designer :</p>
                                                        <div class="toggle mb-2">
                                                            <input type="radio" id="condd_new" name="profile"
                                                                checked="checked" value="architect">
                                                            <label title="Select Architect"
                                                                class="text-center d-block cursor-pointer"
                                                                for="condd_new">Architect</label>
                                                            <input type="radio" id="condd_used" name="profile"
                                                                value="interior designer">
                                                            <label title="Select Interior Designer"
                                                                class="text-center d-block cursor-pointer"
                                                                for="condd_used">Interior Designer</label>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="input-group">

                                                <!--mobile view search box  -->
                                                <input class="bg-light form-control border-0 small" id="mobile-search"
                                                    type="text" placeholder="Search architects in lucknow/pune..."
                                                    onkeyup="getExtLiveSearchUsers(this.value)" name="city"
                                                    autocomplete="off">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary btn-sm py-0" type="submit">
                                                        <i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                            <div
                                                class="profiles-list-mobile w-100 dropdown-menu dropdown-menu-animated mt-n2 d-block  dropdown-lg bg-transparent col-md-6 border-0 search_results">
                                            </div>
                                        </form>

                                        <script>
                                        $(document).on("click", ".profiles-list .city, .profiles-list-mobile .city",
                                            function() {
                                                var clickedBtnID = $(this).text(); // or var clickedBtnID = this.id
                                                $('#top-search').val(clickedBtnID);
                                                $('#mobile-search').val(clickedBtnID);
                                            });
                                        </script>
                                        <!-- Loop from here -->

                                        <!-- Loop till here -->

                                        <!-- </div> -->
                                    </div>
                                </li>
                                <!-- Nav Item - Messages -->
                                
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="getDropdownData('<?php echo $userLoggedIn; ?>', 'message')">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo $num_messages; ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div style="" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in dropdown_data_window" aria-labelledby="messagesDropdown">
              <!-- End of Dropdown - Messages -->
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>
                                <div class="d-none d-sm-block topbar-divider">
                                </div>
                                <li class="nav-item dropdown no-arrow" role="presentation">
                                    <div class="nav-item dropdown no-arrow">
                                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false"
                                            href="#">
                                            <span class="d-none d-lg-inline mr-2 text-gray-600 small">
                                                <?php
                                                    echo "Hello ".$user['first_name']." ".$user['last_name'];  
                                                ?>
                                            </span>
                                            <span id="uploaded_image_header">
                                                <img id="uploaded_image_img" class="rounded-circle border mb-3 mt-4"
                                                    src="<?php echo $row['profile_pic']; ?>" width="40"
                                                    height="40"></span>
                                        </a>

                                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"
                                            role="menu">
                                            <a class="dropdown-item" role="presentation" href="logout.php"><i
                                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- End of Topbar -->
