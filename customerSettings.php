<?php
include("includes/header.php");  
include("includes/form_handlers/settings_handler.php");
$profile_pic = $user['profile_pic'];
if (isset($_SESSION['uname'])) {
    # code...
    $check=($_SESSION['uname']);
    print_r($check);
    header("Location:https://homesinfra.com/".$check);
    // header("Location:http://localhost/interaction_bootstrap/".$check);
    unset($_SESSION["uname"]);
}
$result=$con->query("SELECT * FROM users WHERE username='$userLoggedIn'");
$row = mysqli_fetch_array($result);
?>
<div class="container-fluid">
    <h3 class="text-gray-900 mb-4">Profile: <?php
            echo $row['profile'];    
    ?></h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <p class="text-gray-900 m-0 font-weight-bold">Profile Picture</p>
                </div>

                <!-- Image Start -->


                <div class="card-body text-center " id="uploaded_image">
                    <div class="">
                        <img style="width:160px; border: 5px solid whitesmoke; height:160px; display: inline-block;"
                            class="rounded-circle img _1-yc profpic" src="<?php echo $row['profile_pic']; ?>" alt="" />

                        <div class="mb-3">
                            <div class="text-center" style="transform:translate(40px, -65px);">
                                <span style="z-index:1; opacity:0;" class="position-absolute"><input type="file"
                                        id="file" style="width: 40px; height: 40px;" accept="image/*" name="file"
                                        class="p-0" value="Upload Image"></span>

                                <span class=" rounded-circle p-1 bg-white position-absolute">

                                    <svg version="1.2" height="40px" width="40px" baseProfile="tiny" id="Layer_1"
                                        focusable="false" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40"
                                        overflow="visible" xml:space="preserve">
                                        <circle fill="#FFFFFF" cx="20" cy="20" r="19.7" />
                                        <path d="M31.3,9h-4.5l-2.6-2.9h-8.5L13.2,9H8.7c-1.6,0-2.8,1.3-2.8,2.9V29c0,1.6,1.3,2.9,2.8,2.9h22.6c1.6,0,2.8-1.3,2.8-2.9V11.8
	C34.1,10.3,32.8,9,31.3,9z M31.3,29H8.7V11.8h22.6V29z M20,14.7c-3.1,0-5.6,2.6-5.6,5.7s2.5,5.7,5.6,5.7s5.6-2.6,5.6-5.7
	S23.1,14.7,20,14.7z" />
                                    </svg>
                                </span>
                                <script>
                                $(document).ready(function() {
                                    $(document).on('change', '#file', function() {
                                        var name = document.getElementById("file").files[0].name;
                                        var form_data = new FormData();
                                        var ext = name.split('.').pop().toLowerCase();
                                        if (jQuery.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                                            alert("Invalid Image File");
                                        }
                                        var oFReader = new FileReader();
                                        oFReader.readAsDataURL(document.getElementById("file").files[
                                            0]);
                                        var f = document.getElementById("file").files[0];
                                        var fsize = f.size || f.fileSize;
                                        if (fsize > 10485760) {
                                            alert("Image File Size is very big");
                                        } else {
                                            form_data.append("file", document.getElementById('file')
                                                .files[
                                                    0]);
                                            $.ajax({
                                                url: "profileUpload.php",
                                                method: "POST",
                                                data: form_data,
                                                contentType: false,
                                                cache: false,
                                                processData: false,
                                                beforeSend: function() {
                                                    $('#uploaded_image img').attr('src',
                                                        './assets/images/icons/uploadcloud.gif'
                                                    );
                                                },
                                                success: function(data) {
                                                    // $('#uploaded_image').html(data);
                                                    var rdimagepath = data;
                                                    $('#uploaded_image img, #uploaded_image_header img')
                                                        .attr('src', data);
                                                }
                                            });
                                        }
                                    });
                                });
                                </script>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Image End -->

            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header py-3">
                            <p class="text-gray-900 m-0 font-weight-bold">Contact Settings</p>
                        </div>
                        <div class="card-body">
                            <form id="customer_settings">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="inputName" id="customer_is_pressed"
                                        value="customer_is_pressed">
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-label-group">
                                            <input class="form-control" type="text" placeholder="email id." id="email"
                                                value="<?php echo $user['email'];?>" autocomplete="off">
                                            <label for="email">Email address</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-label-group">
                                            <input class="form-control" type="text" placeholder="Residential Address"
                                                id="residential_address"
                                                value="<?php echo $user['residential_address'];?>" autocomplete="off">
                                            <label for="residential_address">Residential Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-label-group">
                                            <input class="form-control" type="text" placeholder="Office Address"
                                                id="office_address" value="<?php echo $user['office_address'];?>"
                                                autocomplete="off">
                                            <label for="office_address">Office Address</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-label-group">
                                            <input class="form-control" type="text" placeholder="Mobile Number"
                                                id="mobile_no2" maxlength="10" value="<?php echo $user['office_no'];?>"
                                                autocomplete="off">
                                            <label for="mobile_no2">Mobile Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
</div>
</div>
<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Copyright ?? HomesInfra 2020</span></div>
    </div>
</footer>
</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="rd/assets/js/script.min.js"></script>
<script src="assets/js/rdjsfile.js"></script>
<script src="assets/js/demo.js"></script>
<!-- outside JS  -->

<script>
$(document).ready(function() {
    $('#customer_settings').on('submit', function(e) {
        //Stop the form from submitting itself to the server.
        e.preventDefault();
        var customer_is_pressed = $('#customer_is_pressed').val();
        var email = $('#email').val();
        var residential_address = $('#residential_address').val();
        var office_address = $('#office_address').val();
        var mobile_no2 = $('#mobile_no2').val();
        $.ajax({
            type: "POST",
            url: 'customerSettingsSubmit.php',
            data: {
                customer_is_pressed: customer_is_pressed,
                email: email,
                residential_address: residential_address,
                office_address: office_address,
                mobile_no2: mobile_no2
            },
            success: function(data) {
                alert("updated successfully");
            }
        });
    });
});
</script>
</body>


</html>
