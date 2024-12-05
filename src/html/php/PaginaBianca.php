<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body{
            background-color: grey;
        }
    </style>
    <meta name="Author" content="Gruppo05"/>
    <base href="../"/>
    <link rel="icon" href="img/favicon.png" type="image/png/">
    <link rel="stylesheet" href="css/TopMenu.css"/>

    <style>
        .sm{
            display:none;
        }
    </style>
    <script>
        function openSideMenu(){
            var sm=document.getElementById("sideMenu");
            sm.classList.toggle("sm");
        }
    </script>
</head>
<body>
<?php include_once 'TopMenu.html'?>
</body>
</html>