<?php
echo '<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>-->
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> System Status<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="instSummary.php">Institutional Summary</a>
                                </li>
								 <li>
                                    <a href="powerSource.php">Power Source</a>
                                </li>
                                <li>
                                    <a href="batteryLevels.php">Battery Levels</a>
                                </li>
                                 <li>
                                    <a href="networkStatus.php">Network Status</a>
                                </li>
                                <li>
                                    <a href="internetSource.php">Internet Source</a>
                                </li>
                                <li>
                                    <a href="liveMonitor.php">Live Monitor</a>
                                </li>


                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            
                        </li>
						 <li>
                            <a href="addInstitution.php"><i class="fa fa-certificate fa-fw"></i>   Register Inst.</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>';
?>