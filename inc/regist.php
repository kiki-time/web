<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>회원가입</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php require_once("inc/header.php"); ?>
        <div class="center">
            <div class="signup">Sign Up</div>
            <form method="POST" action="regist.post.php">
                <input type="text" class="text-field" id="login_id" placeholder="ID">
                <input type="password" class="text-field" id="login_pw" placeholder="password">
                <input type="password" class="text-field" id="login_pw_confirm" placeholder="check password">
                <br><br>
                <input type="text" class="text-field" id="login_name" placeholder="Name">
                <input type="email" class="text-field" id="usermail" placeholder="email">
                <input type="submit" value="Sign Up" class="submit-btn">
            </form>
        </div>
    </body> 
</html>