<?php 
require_once('includes/connect.php');
require_once('check-login.php'); 
include('includes/header.php');
include('includes/navigation.php');
include('includes/phpqrcode/qrlib.php');
include('includes/functions.php');

$reference_start = "GSSCCH-";
$issueYear = date("y");
$collegeCode = "GSSCCH";
$slash = "/";
$current_date = date("d.m.y");
$dateofissue =  date("y.m.d");
$new_id = $idhere; //Reference No from database id, procssed with lastid.php
$tempDir = 'qr_images/'; 
$filename = $reference_start.$new_id.'-'.$issueYear; //GSSCCH-123-2022
$qrContent = $collegeCode.$slash.$new_id.$slash.$issueYear; //GSSCCH/123/2022
// $codeContents =  
$codeContents = $qrContent;

if(isset($_POST['submit']) ) {
    // Generating QR CODE PNG Image
    QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
    $filenamepdf = $filename.".PDF";
    $referenceno = $qrContent;
    // $dateofissue = $_POST['dateofissue'];
    $dateofissue = $current_date;
    $addressto = $_POST['addressto'];
    $subject = $_POST['subject'];
    $doccategory = $_POST['doccategory'];
    $name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $data = file_get_contents($_FILES['myfile']['tmp_name']);

    $stmt = $db->prepare("INSERT INTO outward (referenceno, dated, address_to, subject, category, filename, mime, filedata)
        VALUES(?,?,?,?,?,?,?,?)"); 
        // To-DO = Add 1.Time with Date 2.category
        $stmt->bindParam(1,$referenceno);
        $stmt->bindParam(2,$dateofissue);
        $stmt->bindParam(3,$addressto);
        $stmt->bindParam(4,$subject);
        $stmt->bindParam(5,$doccategory);
        $stmt->bindParam(6,$filenamepdf); //old param was (5,$name)
        $stmt->bindParam(7,$type);
        $stmt->bindParam(8,$data);
        $stmt->execute();

}

?>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">CREATE OUTWARDS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="user" method="post" onsubmit="return clickMe(this);" enctype="multipart/form-data">
                    <div class="form-group">
                        <div>

                        <!-- To-DO = Add Dropdown for Dept. Section Selection 
                                     Add Dispetcher Staff
                                     Add Doc Category-->
                        <label>Letter No.</label>
                        <input type="text" class="form-control form-control-user"
                                name="refno" placeholder="Reference Number"
                                disabled value="<?php echo $codeContents; ?>" required style=" margin-bottom: 2%;" />
                       </div>
                       <div>
                        <label>Latter Issuing Date</label>
                        <input type="text" class="form-control form-control-user"
                                name="dateofissue" placeholder="Date"
                                disabled value="<?php echo $current_date; ?>" 
                                required style="margin-bottom: 2%;" />
                        </div>
                        <div>
                        <label>Address TO</label>
                        <input type="text" class="form-control form-control-user"
                                name="addressto" placeholder="Address To" 
                                required style=" margin-bottom: 2%;" />
                        </div>
                        <div>
                        <label>Letter Subject</label>
                        <input type="text" class="form-control form-control-user"
                                name="subject" placeholder="Subject" 
                                required style=" margin-bottom: 2%;" />
                        </div>
                        <div>
                        <label>Doc Category</label>
                        <select name="doccategory" class="form-control form-control-user">
                            <option selected disabled>-- SELECT CATEGORY --</option>
                            <?php
                        $stat = $db->prepare("SELECT * FROM category");
                        $stat->execute();
                        while ($row = $stat->fetch()) {
                             echo '<option value="'.$row['categoryname'].'">'.$row['categoryname'].'</option>';
                            }
                        ?>
                        </select>
                        </div>
                        <div>
                        <br />
                        <label>Upload PDF</label>
                        <input type="file" class="form-control form-control-user" name="myfile" accept="application/pdf"    required style=" margin-bottom: 2%;" />
                        </div>
                        <div>
                        <input type="submit" name="submit" class="btn btn-success submitBtn btn-block" <?php if(isset($_POST['submit']) ) { $disabled="disabled"; echo $disabled; } ?> />
                        </div>
                    </div>                            
                </form> 
            </div>
            <div class="col-lg-6">
                
                <center>
                    <div class="qrframe" style="border:2px solid black; width:210px; height:210px;">
                            <?php echo '<img alt="QR Image here" src="qr_images/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
                    </div>
                    <a class="btn btn-success submitBtn" style="width:20em; margin:15px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>
                </center>
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