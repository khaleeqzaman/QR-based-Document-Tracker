<?php 
require_once('includes/connect.php');
require_once('check-login.php'); 
include('includes/header.php');
include('includes/navigation.php');

if(isset($_POST['submit']) ) {
    $staffname = $_POST['staffname'];
    $stmt = $db->prepare("INSERT INTO staff (staffname)
        VALUES(?)"); 
        $stmt->bindParam(1,$staffname);
        $stmt->execute();

}

?>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">ADD DOC RECIEVER STAFF</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="user" method="post" onsubmit="return clickMe(this);">
                    <div class="form-group">
                        <div>

                        <input type="text" class="form-control form-control-user"
                                name="staffname" placeholder="Doc Reciever Staff Name"
                                required style=" margin-bottom: 2%;" />
                       </div>
                        <div>
                        <input type="submit" name="submit" class="btn btn-success submitBtn btn-block" <?php if(isset($_POST['submit']) ) { $disabled="disabled"; echo $disabled; } ?> />
                        </div>
                    </div>                            
                </form> 
            </div>
            </div>
        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Sweet Alert -->
        <script type="text/javascript">
            function clickMe(form) {
                swal({
                title: "Success",
                text:  " Record has been saved",
                icon: "success",
                 button: "OK",
                });
            }
            
        </script>

 <?php include('includes/footer.php'); ?>