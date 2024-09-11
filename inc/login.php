<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>로그인</title>
        <link rel="stylesheet" href="style.css">
        <script src="action.js"></script>
    </head>
    <body>
        <?php require_once("inc/header.php"); ?>
        <div class="center">
            <div class="Login"> Login </div>
            <br>
            <div>
                <form method="POST" action="login.post.php">
                    <input type="text" class="text-field" id="login_id" placeholder="ID">
                    <input type="password" class="text-field" id="login_pw" placeholder="password">
                    <br>
                    <input type="submit" value="Login" class="submit-btn">
                </form>
                <div class="links">
                    <a href="regist.html">Sign up</a>
                </div>
            </div>
        </div>
    </body>
</html>