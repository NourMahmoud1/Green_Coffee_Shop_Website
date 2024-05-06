<?php
include './componets/connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

// register user

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ? ");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);
    if ($select_user->rowcount() > 0) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        header('location: http://localhost/Green_Coffee_Shop_Websit/home.php');
    } else {
        $message[] = 'incorrect username or password';
    }
}
?>
<style type="text/css">
    <?php include 'style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green tea - login now</title>
</head>

<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <img src="./img/download.png">
                <h1> login now </h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur odio eius nemo exercitationem dolore voluptates ab qui aspernatur dolorem. Labore porro repellendus corrupti hic soluta, est culpa ducimus rem expedita.</p>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>your email</p>
                    <input type="email" name="email" required placeholder="enter your email">
                </div>
                <div class="input-field">
                    <p>your password</p>
                    <input type="password" name="pass" required placeholder="enter your password">
                </div>
                <input type="submit" value="register now" name="submit" class="btn">
                <p>don't have an account <a href="register.php">register now </a></p>
            </form>
        </section>
    </div>
    <script src="./componets/sweetalert.js"></script>
    <script src="script.js"></script>
    <?php include 'componets/alert.php'; ?>
</body>

</html>