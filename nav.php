<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="test.php"><img src="img/productlogosm.png" alt=""></a>
    </div>
    
     <ul class="nav navbar-top-links navbar-right">
        <li>
            <h5>Welcome, Guest</h5>
        </li>
        
        <!--<li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                            <span class="pull-right text-muted small">12 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-envelope fa-fw"></i> Message Sent
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-tasks fa-fw"></i> New Task
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            
        </li> -->
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>-->
                <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li> 
                <li class="divider"></li> -->
                <li><a href="test.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <form action="test.php" method="GET">
                    <div class="input-group custom-search-form">
                        
                            <input type="text" name="symbol" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                            </span>
                        
                    </div>
                    </form>
                    
                </li>
            
                <li>
                    <a href="test.php"><i class="fa fa-yahoo"></i> Yahoo</a>
                </li>

                <li>
                    <a href="test.php?symbol=GOOG"><i class="fa fa-google"></i> Google</a>
                </li>

                <li>
                    <a href="test.php?symbol=AAPL"><i class="fa fa-apple"></i> Apple</a>
                </li>

                <li>
                    <a href="test.php?symbol=MSFT"><i class="fa fa-windows"></i> Microsoft</a>
                </li>

                

                 
                <!-- 
                <li>
                    <a href="#"><i class="glyphicon glyphicon-th"></i> Administration<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>    
                            <a href="#"><i class="fa fa-lock"></i> Syllabi Content <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Content Types</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="templatelibrary.php">Template Library</a>
                        </li>
                        <li>
                            <a href="#">Manage C</a>
                        </li>
                        
                    </ul>
                -->
                    <!-- /.nav-second-level -->
                <!--</li>
                    
                <li>
                    <a href="#"><i class="glyphicon glyphicon-refresh"></i> Synchronize Data with PowerCampus</a>
                </li>
                -->

                                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
