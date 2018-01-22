<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
?><!--<!DOCTYPE html>-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Messages</title>
    <style type="text/css">
        body {
            font-family: "Sailec", Arial;
            background-image: url(http://www.techyaustralia.com/wp-content/uploads/2016/12/website-design-background.png);
            background-size: 100% auto;
            background-width: 100%;
            background-repeat:no-repeat;
            padding: 0;
            margin: 0;
        }

        .vid-container {
            position: relative;
            height: 100vh;
            overflow: scroll;
        }

        h2 {
            font-family: "Sailec", Arial;
            color: white;
            font-size:20px;
            text-align: center;
            background-color: #2f2f2f;
            display: block;



            
        }

        .inner-container {
            width: 800px;
            height: 600px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            top: 5%;


        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        .box {
            position: absolute;
            height: 100%;
            width: 100%;
            font-family: "Sailec", Arial;
            color: #fff;
            background: rgba(0, 0, 0, 0.13);
            padding: 30px -100px;
            overflow: auto;
        }

        .box h1 {
            text-align: center;
            margin: 30px 0;
            font-size: 30px;
        }

        .box input {
            display: block;
            width: 300px;
            margin: 20px auto;
            padding: 15px;
            background: rgba(0, 0, 0, 0.2);
            color: #fff;
            border: 0;
        }

        .box input:focus, .box input:active, .box button:focus, .box button:active {
            outline: none;
            color: #595959;
        }

        .box button {
            background: #0086b3;
            border: 0;
            color: #fff;
            padding: 10px;
            font-size: 20px;
            width: 330px;
            margin: 20px auto;
            display: block;
            cursor: pointer;
        }

        .box button:active {
            background: #27ae60;
        }

        .box p {
            font-size: 14px;
            text-align: center;
        }

        .box p span {
            cursor: pointer;
            color: #666;
        }

        .box1 {
            width: 300px;
            margin: 50px auto;
            border: 4px solid #20B2AA;
            padding: 20px;
            text-align: center;
            font-weight: 900;
            background-color: #2f2f2f;
            color: #fff;
            font-family: arial;
            position: relative;
            font-family: "Sailec", Arial;
            border-radius: 15px;
        }

        .sb5:before {

            content: "";
            width: 0px;
            height: 0px;
            position: absolute;
            border: 10px solid #20B2AA;
            border-right-color: transparent;
            border-bottom-color: transparent;
            right: -21px;
            top: 6px;
            font-family: "Sailec", Arial;
        }

        .sb5:after {
            content: "";
            width: 0px;
            height: 0px;
            position: absolute;
            border: 7px solid #fff;
            border-right-color: transparent;
            border-bottom-color: transparent;
            right: -11px;
            top: 10px;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            transition: background-color 5000s ease-in-out 0s;
        }

        ul {

            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 200px;
            font-family: "Sailec", Arial;
            s padding: 0;
            height: 100%;
            float: left;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.13);


        }

        li {
            float: left;
            width: 100%;
            color: white;
            font-family: "Sailec", Arial;

        }

        li a {
            display: block;
            color: white;
            padding: 8px 16px;
            text-decoration: none;

        }

        li a:hover {
            background: rgba(32, 178, 170, 0.30);
        }

        @font-face {
            font-family: "Sailec";
            src: url("JosefinSans-Regular.ttf");
        }
        a { text-decoration : none; color : #ffffff; }
    </style>
    <script>

        function goToUser($user){
            redirect(site_url('user/view/'.$user));
        }
    </script>
</head>
<?php
if (!isset($_SESSION)) {
    session_start();
}
//check if user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>
<body>
<div id="container">
    <div id="body">
        <ul>
            <?php

            if (isset($following)) {//check if the following variable is set
                if (isset($_SESSION['username']) && $following) {//if user is following then do not display follow button
                    echo "<h2>Logged in as ".$_SESSION['username'];'</h2>'; echo "</h2>";
                    ?>
                    <br>
                    <li><a href="<?php echo site_url('user/view/' . $username); ?>">My messages</a></li>
                    <li><a href="<?php echo site_url('message'); ?>">Post a message</a></li>
                    <li><a href="<?php echo site_url('Search'); ?>">Search</a></li>
                    <li><a href="<?php echo site_url('user/feed/' . $username); ?>">Followed messages</a></li>
                    <li style="float: right"><a href="<?php echo site_url('user/logout'); ?>">Logout</a></li>
                    <?php
                } else if (isset($_SESSION['username']) && !($following)) {//if user is not following then dispay the follow button
                    echo "<h2>Logged in as ".$_SESSION['username'];'</h2>'; echo "</h2>";
                    ?>
                    <br>
                    <li><a href="<?php echo site_url('user/view/' . $username); ?>">My messages</a></li>
                    <li><a href="<?php echo site_url('message'); ?>">Post a message</a></li>
                    
                    <li><a href="<?php echo site_url('Search'); ?>">Search</a></li>
                    <li><a href="<?php echo site_url('user/feed/' . $username); ?>">Followed messages</a></li>
                    <li style="float: right"><a href="<?php echo site_url('user/follow/' . $name); ?>">Follow <?php echo $name; ?></a>
                    <li style="float: right"><a href="<?php echo site_url('user/logout'); ?>">Logout</a></li>
                    </li>
                    <?php
                } else {//if user is not logged in display these links in the navigation
                    ?>
                    <br>
                    <br>
                    <br>
                    <li style="float: right"><a href="<?php echo site_url('Search'); ?>">Search</a></li>
                    <li style="float: right"><a href="<?php echo site_url('user/login'); ?>">Log-in</a></li>
                    <?php
                }
            } else {

                ?>
                <li style="float: right"><a href="<?php echo site_url('user/login'); ?>">Login</a></li>
                <li style="float: right"><a href="<?php echo site_url('Search'); ?>">Search</a></li>
                <?php

            }
            ?>
        </ul>
        <div class="vid-container">
            <div class="inner-container">


                <div class="box">
                    <?php

                    if (!empty($result)) {// display messages if not empty
                        foreach ($result as $row) {// show all messages and allow the user to click on the to view the user
                            $user = $row['user_username'];
                            ?>
                            <a href="<?php echo site_url('user/view/'.$row['user_username']);?> "><div class="box1 sb5"><b><?php echo $row['posted_at'] ?> <?php echo $row['user_username']; ?> </b><br><hr> <?php echo $row['text'] ?></div>   </a>
                        <?php
                }
                    }
                    ?>
                </div>
            </div>
        </div>

</body>
</html>
