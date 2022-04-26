<?php 
require_once('includes/connect.php');
require_once('check-login.php'); 
include('includes/tablepageheader.php');
include('includes/navigation.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">ALL INWARDS</h1>
        </div>
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Diary No.</th>
                        <th>Recieved On</th>
                        <th>Letter No.</th>
                        <th>Dated</th>
                        <th>Recieved From</th>
                        <th>Subject</th>
                        <th>Category</th>
                        <th>Recieved By</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stat = $db->prepare("SELECT * FROM inward");
                    $stat->execute();
                    while ($row = $stat->fetch()) {
                    ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['diaryno'];?> </td>
                    <td><?php echo $row['recievedate']; ?></td>
                    <td><?php echo $row['letterno']; ?></td>
                    <td><?php echo $row['dated']; ?></td> <!-- Category -->
                    <td><?php echo $row['recievedfrom']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['recieverstaff']; ?></td>
                    <td><?php echo "<a target='_blank' href='viewin.php?id=".$row['id']."'>"
                        ."Download"."</a>";?> </td>
                    </tr>
                    <tr>
                    <?php
                    }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.row -->
<!-- /#page-wrapper -->
 <?php include('includes/custompagefooter.php'); ?>