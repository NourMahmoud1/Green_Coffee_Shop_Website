<?php
include 'componets/connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

// register user

if (isset($_POST['submit'])) {
    ///$id = unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = $_POST['cpass'];
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowcount() > 0) {
        $message[] = 'email already exist';
        echo 'email already exist';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm your password';
            echo 'confirm your passwoord';
        } else {
            $insert_user = $conn->prepare("INSERT INTO users(name, email, password) VALUES(?, ?, ?)");
            $insert_user->execute([$name, $email, $pass]);
            header("location:login.php ");
            $select_user = $conn->prepare("SELECT * FROM users WHERE email = ? ");
            $select_user->execute([$email,]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if ($select_user->rowcount() > 0) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
            }
        };
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
    <title>Green tea - register now</title>
</head>

<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <img src="./img/download.png">
                <h1> Register now </h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur odio eius nemo exercitationem dolore voluptates ab qui aspernatur dolorem. Labore porro repellendus corrupti hic soluta, est culpa ducimus rem expedita.</p>
            </div>
            <form action="" method="post">
                <div class="input-field">
                    <p>your name</p>
                    <input type="text" name="name" required placeholder="enter your name">
                </div>
                <div class="input-field">
                    <p>your email</p>
                    <input type="email" name="email" required placeholder="enter your email">
                </div>
                <div class="input-field">
                    <p>your password</p>
                    <input type="password" name="pass" required placeholder="enter your password">
                </div>
                <div class="input-field">
                    <p>confirm your password</p>
                    <input type="password" name="cpass" required placeholder="confirm your password ">
                </div>
                <input type="submit" value="register now" name="submit" class="btn">
                <p>already have an account <a href="login.php">login now </a></p>
            </form>
        </section>
    </div>
    <script src="./componets/sweetalert.js"></script>
    <script src="script.js"></script>
    <?php include 'componets/alert.php'; ?>
</body>

</html>