<?php 
require_once('includes/connect.php');
require_once('check-login.php'); 
include('includes/header.php');
include('includes/navigation.php');
include('includes/phpqrcode/qrlib.php');
include('includes/functions2.php');


$reference_start = "DAIRYNO-"; 
$dairyno = "DAIRYNO";
$slash = "/";
$issueYear = date("y");
$new_id = $idhere;
$filename = $reference_start.$new_id.'-'.$issueYear; //DAIRYNO-123-2022
$tempDir = 'qr_images/inward/';
$codeContents = $dairyno.$slash.$new_id.$slash.$issueYear; //DAIRYNO/123/2022

if(isset($_POST['submit']) ) {
   
    // Generating QR CODE PNG Image
    QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
    $filenamepdf = $filename.".PDF";
    // $diaryno = $_POST['diaryno'];
    $recievedate = $_POST['recievedate'];
    $letterno = $_POST['letterno'];
    $dateofissue= $_POST['dateofissue'];
    $recievedfrom = $_POST['recievedfrom'];
    $subject = $_POST['subject'];
    $doccategory = $_POST['doccategory'];
    $recievedby = $_POST['recievedby'];
    $name = $_FILES['myfile']['name'];
    $type = $_FILES['myfile']['type'];
    $data = file_get_contents($_FILES['myfile']['tmp_name']);

    
    $stmt = $db->prepare("INSERT INTO inward (diaryno, recievedate, letterno, dated, recievedfrom, subject, category, recieverstaff, filename, mime, filedata)
        VALUES(?,?,?,?,?,?,?,?,?,?,?)"); 

        $stmt->bindParam(1,$filename);
        $stmt->bindParam(2,$recievedate);
        $stmt->bindParam(3,$letterno);
        $stmt->bindParam(4,$dateofissue);
        $stmt->bindParam(5,$recievedfrom);
        $stmt->bindParam(6,$subject);
        $stmt->bindParam(7,$doccategory);
        $stmt->bindParam(8,$recievedby);
        $stmt->bindParam(9,$filenamepdf); //old param was (9,$name)
        $stmt->bindParam(10,$type);
        $stmt->bindParam(11,$data);
        $stmt->execute();
}


?>
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" align="center">CREATE INWARDS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="user" method="post" onsubmit="return clickMe(this);" enctype="multipart/form-data">
                    <div class="form-group">
                        <div>
                        <label>Diary Number</label>
                        <input type="text" class="form-control form-control-user"
                                name="diaryno" placeholder="Diary Number"
                                value="<?php echo $codeContents; ?>" required disabled style=" margin-bottom: 2%;" />
                       </div>
                       <div>
                        <label>Recieving Date</label>
                        <input type="date" class="form-control form-control-user"
                                name="recievedate" placeholder="Recieving Date"
                                 required style="margin-bottom: 2%;" />
                        </div>
                       <div>
                        <label>Letter Number</label>
                        <input type="text" class="form-control form-control-user"
                                name="letterno" placeholder="Letter Number"
                                required style=" margin-bottom: 2%;" />
                       </div>

                       <div>
                        <label>Letter Dated</label>
                        <input type="date" class="form-control form-control-user"
                                name="dateofissue" placeholder="Issuing Date"
                                required style="margin-bottom: 2%;" />
                        </div>
                        <div>
                        <label>Letter Recieved From</label>
                        <input type="text" class="form-control form-control-user"
                                name="recievedfrom" placeholder="Recieved From" 
                                required style=" margin-bottom: 2%;" />
                        </div>
                        <div>
                        <label>Letter Subject</label>
                        <input type="text" class="form-control form-control-user"
                                name="subject" placeholder="Subject" 
                                required style=" margin-bottom: 2%;" />
                        </div>
                        <div>
                        <label>Document Cateory</label>
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
                        <label>Doc Recieving Person</label>
                        <select name="recievedby" class="form-control form-control-user">
                            <option selected disabled>-- SELECT RECIEVED BY --</option>
                            <?php
                        $stat = $db->prepare("SELECT * FROM staff");
                        $stat->execute();
                        while ($row = $stat->fetch()) {
                             echo '<option value="'.$row['staffname'].'">'.$row['staffname'].'</option>';
                            }
                        ?>
                        </select>
                        <div>
                        <label>Upload Document</label>
                        <input type="file" class="form-control form-control-user" name="myfile" accept="application/pdf" required style=" margin-bottom: 2%;" />
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
                            <?php echo '<img alt="QR Image here" src="qr_images/inward/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
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