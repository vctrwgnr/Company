<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <style>
        td, th{
            padding: 10px;
        }
        .message{
            background-color: lightcoral;
            color: white;
            font-size: 20px;
            text-align: center;
            visibility: visible;
            padding: 5px;
            /* display: none; */
        }
        
    </style>
</head>
<body>
    <!-- Nachricht an User, wenn er etwas nicht ausführen lassen kann z.B. Verstoß gegen FK- Constraint -->
<div class="message"><?php echo $message; ?></div>
<?php include 'views/navigation.php'; ?>

