<?php
include("includes/header.php");
$result=$con->query("SELECT * FROM users WHERE username='$userLoggedIn'");
$row = mysqli_fetch_array($result);
$cr_fname=$row['first_name']." ";
$cr_lname=$row['last_name'];

//project file upload section start

if(isset($_POST['upload_project_file'])) {

	$uploadOk2 = 1;
	$imageName2 = $_FILES['fileToUpload2']['name'];
	$errorMessage2 = "";
	$image_name_orig2="";
	
	if($imageName2 != "") {
		$targetDir2 = "assets/projectFiles/";
		$image_name_orig2=basename($imageName2); 
		$imageName2 = $targetDir2 . uniqid() . basename($imageName2);
		$imageFileType2 = pathinfo($imageName2, PATHINFO_EXTENSION);

		if($_FILES['fileToUpload2']['size'] > 10000000) {
			$errorMessage2 = "Sorry your file is too large";
			$uploadOk2 = 0;
		}

		if(strtolower($imageFileType2) != "jpeg" && strtolower($imageFileType2) != "png" && strtolower($imageFileType2) != "jpg" && strtolower($imageFileType2) != "dwg" && strtolower($imageFileType2) != "dwf" && strtolower($imageFileType2) != "zip" && strtolower($imageFileType2) != "rar" && strtolower($imageFileType2) != "pdf") {
			$errorMessage2 = "Sorry, only jpeg, jpg and png,dwg,rar,zip files are allowed";
			$uploadOk2 = 0;
		}
//204265 8896816566
		if($uploadOk2) {
			if(move_uploaded_file($_FILES['fileToUpload2']['tmp_name'], $imageName2)) {
                //image uploaded okay
			}
			else {
				//image did not upload
				$uploadOk2 = 0;
			}
		}
	}
	if($uploadOk2) {
        $date = date("Y-m-d H:i:s");
        
        //send upload confirmation sms to info@homesinfra start section
        $YourAPIKey='c296cc1f-af95-11ea-9fa5-0200cd936042';
        $From="HIProj";
        $To="8299005351";
        $TemplateName="HI Project Notification";
        $VAR1=$cr_fname.$cr_lname;
        // $VAR2="<VAR2>";
        // $VAR3="<VAR3>";
        // $VAR4="<VAR4>";
        // $VAR5="<VAR5>";
        
        ### DO NOT Change anything below this line
        $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
        $url = "https://2factor.in/API/R1/?module=TRANS_SMS"; 
        $ch = curl_init(); 
        curl_setopt($ch,CURLOPT_URL,$url); 
        curl_setopt($ch,CURLOPT_POST,true); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch,CURLOPT_POSTFIELDS,"apikey=$YourAPIKey&to=$To&from=$From&templatename=$TemplateName&var1=$VAR1");  
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_exec($ch); 
        echo "Project Uploaded Successfully";
        curl_close($ch); 
        //send upload confirmation sms to info@homesinfra end section
        
        $insert_query1 = mysqli_query($con, "INSERT INTO fileupload VALUES('','$image_name_orig2', 'application/octet-stream','File Transfer', 'attachment','0','must-revalidate', 'public', '50', '$userLoggedIn','','$date', '', '', '$date', '0', '0', '0','$imageName2')");
	}
	else {
		echo "<div style='text-align:center;' class='alert alert-danger'>
				$errorMessage2
			</div>";
	}
}
//project file upload section ends
?>

<div class="container-fluid">
    <div class="row div col-12">
        <div class="text-gray-900 h3 display-4 mb-3">
            Project Management
        </div>
    </div>
    <div class="row">
        <div class="col-12 m-auto">
            <div class="card shadow-sm mb-3">
                <div class="card-header py-1">
                    <p class="text-gray-900 m-0 font-weight-bold">Upload a Project</p>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <input type="file" id="user_group_logo" class="custom-file-input" name="fileToUpload2">
                            <div class="text-center">
                                <label id="user_group_label" for="user_group_logo"><i class="fas fa-upload"></i> Choose
                                    a
                                    file...</label>
                            </div>
                            <div class="text-center mt-2">
                                <button class="btn btn-primary" type="submit" name="upload_project_file">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                    <div class="h4 text-gray-900 font-weight-bold m-0">Track Projects</div>
                </div>
                <div class="card-body scroll">
                    <?php                       
               $stmt=$db->prepare("SELECT * FROM fileupload WHERE uploaded_by='$userLoggedIn' ORDER BY id DESC ");  
                $stmt->execute();
                while($row=$stmt->fetch()){       
                ?>
                    <h4 class="small font-weight-bold">
                        <?php
                                    echo "Filename:";
                                    echo $row['filename']; 
                                    echo "  ";
                                    echo "Uploaded on:";
                                    echo $row['uploaded_on']; 
                                        ?>
                    </h4>

                    <div class="progress progress-sm mb-3" style="height: 15px;">

                        <div class="progress-bar bg-success" aria-valuemin="0" aria-valuemax="40" style="width: <?php 
                                                    echo $row['sketchup_status'].'%'
                                                    ?>;">Modeling
                        </div>

                        <div class="progress-bar bg-warning" aria-valuemin="0" aria-valuemax="40" style="width: <?php 
                                                    echo $row['lumion_status'].'%'
                                                    ?>;">Rendering
                        </div>

                        <div class="progress-bar bg-primary" aria-valuemin="0" aria-valuemax="20" style="width: <?php 
                                                    echo $row['vr_status'].'%'
                                                    ?>;">360/vr
                        </div>

                    </div>
                    <?php
                }  
            ?>

                </div>
            </div>
        </div>
    </div>

</div>
</div>

<footer class="bg-white sticky-footer">
    <div class="container my-auto">
        <div class="text-center my-auto copyright"><span>Copyright © HomesInfra 2020</span></div>
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
</body>

</html>
