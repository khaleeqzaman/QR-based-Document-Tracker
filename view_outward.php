<?php 
require_once('includes/connect.php');
require_once('check-login.php'); 
include('includes/tablepageheader.php');
include('includes/navigation.php');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" align="center">ALL OUTWARDS</h1>
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
                        <th>Letter No.</th>
                        <th>Subject</th>
                        <th>Category</th>
                        <th>Dated</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stat = $db->prepare("SELECT * FROM outward");
                    $stat->execute();
                    while ($row = $stat->fetch()) {
                    ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['filename'];?> </td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['dated']; ?></td> <!-- Category -->
                    <td><?php echo "<a target='_blank' href='view.php?id=".$row['id']."'>"
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