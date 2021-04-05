<?php
include("includes/header.php");
?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Creative Details</h2>
                    </div>
                    <?php
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM users";
                    if($result = $con->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>first name</th>";
                                        echo "<th>last name</th>";
                                        echo "<th>profile</th>";
                                        echo "<th>location</th>";
                                        echo "<th>email</th>";
                                        echo "<th>signup date</th>";
                                        echo "<th>mobile no</th>";
                                        echo "<th>coa no</th>";
                                        echo "<th>company name</th>";
                                        echo "<th>experience years</th>";                       
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                $i=1;
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        $i++;
                                        echo "<td>" . $row['first_name'] . "</td>";
                                        echo "<td>" . $row['last_name'] . "</td>";
                                        echo "<td>" . $row['profile'] . "</td>";
                                        echo "<td>" . $row['location'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['signup_date'] . "</td>";
                                        echo "<td>" . $row['mobile_no'] . "</td>";
                                        echo "<td>" . $row['coa_no'] . "</td>";
                                        echo "<td>" . $row['company_name'] . "</td>";
                                        echo "<td>" . $row['expe_years'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    $con->close();
                    ?>
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
