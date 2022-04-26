        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Document Tracking Management System  </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="outward.php"><i class="fa fa-qrcode fa-fw"></i>Outwards</a>
                        </li>
                        <li>
                            <a href="view_outward.php"><i class="fa fa-thin fa-eye fa-fw"></i> View Outwards</a>
                        </li>
                        <li>
                            <a href="inward.php"><i class="fa fa-thin fa-file fa-fw"></i>Inwards</a>
                        </li>
                        <li>
                            <a href="view_inward.php"><i class="fa fa-thin fa-eye fa-fw"></i> View Inwards</a>
                        </li>
                        <li>
                            <a href="add_staff.php"><i class="fa fa-thin fa-user fa-fw"></i>Add Staff</a>
                        </li>
                        <li>
                            <a href="add_doc_category.php"><i class="fa fa-duotone fa-copy fa-fw"></i>Add Doc Category</a>
                        </li>
                        <li>
                            <a href="add_dept_sec.php">Add Dept. Section</a>
                        </li>
                        <li>
                            <a href="add_custom_qr.php">Add Custom QR</a>
                        </li>
                        </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>