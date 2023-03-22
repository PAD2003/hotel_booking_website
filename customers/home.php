<?php
    session_start();

    if (isset($_SESSION['cusID'])) {
?>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<html>
        <head>
            <link rel="stylesheet" href="menu.css">
            <link rel="stylesheet" href="account.css">
        </head>

        <body>
            <div class="main-container">
                <!-- HEADER -->
                <header class="block">
                    <ul class="header-menu horizontal-list">
                        <li>
                            <a class="header-menu-tab" href="updateAccount.php"><span class="icon fontawesome-user scnd-font-color"></span>Update</a>
                        </li>
                        <li>
                            <a class="header-menu-tab" href="reservations.php"><span class="icon fontawesome-star-empty scnd-font-color"></span>Your Reservations</a>
                        </li>
                        <li>
                            <a class="header-menu-tab" href="booking.php"><span class="icon fontawesome-envelope scnd-font-color"></span>Booking</a>
                        </li>
                        <li>
                            <a class="header-menu-tab" href="../account/logout.php"><span class="icon fontawesome-envelope scnd-font-color"></span>Log out</a>
                        </li>
                    </ul>
                    <div class="profile-menu">
                        <p><?php echo $_SESSION['cusName']; ?> <a href="#26"><span class="entypo-down-open scnd-font-color"></span></a></p>
                    </div>
                </header>

            <div class="resume">

                <!-- LEFT -->
                <div class="resume_left">
                    
                    <div class="resume_content">
                    <div class="resume_item resume_info">
                        <div class="title">
                            <!-- name -->
                            <p class="bold"><?php echo $_SESSION['cusName']?></p>
                        </div>
                        <ul>
                        <li>
                            <div class="icon">
                            <i class="fas fa-map-signs"></i>
                            </div>
                            <!-- address -->
                            <div class="data"><?php echo $_SESSION['cusAddress']?></div>
                        </li>
                        <li>
                            <div class="icon">
                            <i class="fas fa-mobile-alt"></i>
                            </div>
                            <!-- phone -->
                            <div class="data"><?php echo $_SESSION['cusPhone']?></div>
                        </li>
                        <li>
                            <div class="icon">
                            <i class="fas fa-envelope"></i>
                            </div>
                            <!-- email -->
                            <div class="data"><?php echo $_SESSION['cusEmail']?></div>
                        </li>
                        </ul>
                    </div>
                    </div>

                </div>


                <!-- RIGHT -->
                <div class="resume_right">

                    <div class="resume_item resume_about">
                        <div class="title">
                        <p class="bold">Our slogans</p>
                        </div>
                        Customer service means making it easy and fast for your customers to get the help they need- when and how they need it.
                    </div>

                    <div class="resume_item resume_work">
                        <div class="title">
                        <p class="bold">Our Development Journey</p>
                        </div>
                        <ul>
                            <li>
                                <div class="date">2015 : First hotel</div> 
                                <br>
                            </li>
                            <li>
                            <div class="date">2020 : 5th hotel inaugurated</div> 
                                <br>
                            </li>
                            <li>
                            <div class="date">NOW : International hotel system</div>
                                <br>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </body>
</html>


<?php
    } else {
        header("Location: ../index.php");
        exit();
    }
?>