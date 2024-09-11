<?php
// 로그인 되어 있으면 목록으로 이동
session_start();
if (isset($_SESSION['member_id'])){
    header("Location: /list.php");
    exit();
}
 //소개
 ?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="mainheader">Welcome!</div>
    </body>
</html>