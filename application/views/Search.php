<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Search for message</title>
    <style type="text/css">
        body{
            font-family: "Sailec" , Arial;
            background-image: url(http://www.techyaustralia.com/wp-content/uploads/2016/12/website-design-background.png);
            background-size: 100% auto;
            padding:0;
            margin:0;
        }

        .vid-container{
            position:relative;
            height:100vh;
            overflow:scroll;
        }

        h2{
            font-family: "Sailec" , Arial;
            color:white;
            text-align:center;

        }

        .inner-container{
            width:800px;
            height:400px;
            position:relative;
            margin-left:auto;
            margin-right:auto;
            top:10%;

        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        .box{
            position:absolute;
            height:100%;
            width:100%;
            font-family: "Sailec" , Arial;
            color:#fff;
            background:rgba(0,0,0,0.13);
            padding:30px 0px;
            overflow: auto;
        }

        .box h1{
            text-align:center;
            margin:30px 0;
            font-size:30px;
        }

        .box input{
            display:block;
            width:300px;
            margin:20px auto;
            padding:15px;
            background:rgba(0,0,0,0.2);
            color:#fff;
            border:0;
        }

        .box input:focus,.box input:active,.box button:focus,.box button:active{
            outline:none;
        }

        .box button{
            background:#0086b3;
            border:0;
            color:#fff;
            padding:10px;
            font-size:20px;
            width:330px;
            margin:20px auto;
            display:block;
            cursor:pointer;
        }

        .box button:active{
            background:#27ae60;
        }

        .box p{
            font-size:14px;
            text-align:center;
        }

        .box p span{
            cursor:pointer;
            color:#666;
        }

        .box1 {
            width: 300px;
            margin: 50px auto;
            border: 4px solid #00bfb6;
            padding: 20px;
            text-align: center;
            font-weight: 900;
            color: #00bfb6;
            font-family: arial;
            position: relative;
            font-family: "Sailec" , Arial;
        }

        .sb5:before {
            content: "";
            width: 0px;
            height: 0px;
            position: absolute;
            border: 10px solid #00bfb6;
            border-right-color: transparent;
            border-bottom-color: transparent;
            right: -21px;
            top: 6px;
            font-family: "Sailec" , Arial;
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
            margin: auto;
            width: auto;
            font-family: "Sailec" , Arial;s
        padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
            font-family: "Sailec" , Arial;

        }

        li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        @font-face {
            font-family: "Sailec";
            src: url("JosefinSans-Regular.ttf");
        }
        input[type=text]{
            color: #888888;
        }
    </style>

    <script>
        //simple function to go back (making it user friendly)
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
<div id="container">
    <div id="body">
        <div class="vid-container">

            <div class="inner-container">
                <ul>
                    <li><a  onclick="goBack()">Go back</a> </li>
                </ul>
            <div class="box">
            <h2>Search for messages</h2>

        <form action="<?php echo site_url('search/doSearch'); ?>" method = "get">
            <input type="text" name="keyword" placeholder="Enter keyword.."/>
            <input type="submit" value="Search" />

        </form>
            </div>
        </div>
    </div>
</div>
</html>