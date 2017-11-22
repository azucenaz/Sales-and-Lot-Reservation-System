    <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- task notificatoin start -->
                    
                    <!-- alert notification start-->
                       <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">   <?php 

                           include 'connection.php';
                           $getaccount = $dbConn->query("SELECT * FROM own_lot");
                           while($disacc = $getaccount->fetch(PDO::FETCH_ASSOC))
{
$d1 = new DateTime($disacc['datepayment']);
$time = date("Y-m-d");
$d2 = new DateTime($time);

// @link http://www.php.net/manual/en/class.dateinterval.php
$interval = $d2->diff($d1);

$bird = $interval->format('%m');
$minus = $bird - $disacc['months_paid'];

if ($minus >= 1) 
{

    
                $a =1;
                $i = 0;
                $i += $a;
                   

}


}
echo isset($i)? $i :'0';


?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                                                               
                            <li>
                                <a href="#">
                                    <?php echo isset($i) ? "YOU HAVE ".$i." NOT PAID" : '';?>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           
                            <span class="username">
                                <?php 
                                echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ' ';?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li>
                                <a href="change.php" target="_blank"><i class="icon_lock"></i>Change Password</a>
                               
                                
                            </li>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
            