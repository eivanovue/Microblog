<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View user</title>

    <style type="text/css">

        ::selection { background-color: #E13300; color: white; }
        ::-moz-selection { background-color: #E13300; color: white; }

        body {

            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            font-weight: bold;
            border-collapse: separate;
            border-spacing: 200px 0;
        }
        td {
            padding: 5px 0;
        }

        #body {
            text-align: left;
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            text-align: center;
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
        #container table{
            margin: 0 auto;
            text-align: left;
        }
    </style>
</head>
<body>

<div id="container">


    <div id="body">
        <h2>Results from query</h2>
        <br>
        <form action="<?php echo site_url('Search/doSearch');?>" method = "get">
            <input type="text" name = "keyword"/>
            <input type="submit" value = "Search" />
        </form>

    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>