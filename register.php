<?php
 include './componets/connection.php' ;
?>
<style type="text/css">
    <?php include 'style.css' ; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green tea - register now</title>
</head>
<body>
    <div class ="main-container">
        <section class ="form-container">
            <div class ="title">
                <img src =".\img\download.png">
                <h1> Register now </h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur odio eius nemo exercitationem dolore voluptates ab qui aspernatur dolorem. Labore porro repellendus corrupti hic soluta, est culpa ducimus rem expedita.</p>
            </div>
            <form action="" method ="post">
                <div class ="input-field">
                    <p>your name <sup> * </sup></p>
                    <input type="text" name="name" required  placeholder="enter your name" >
                </div>                <div class ="input-field">
                    <p>your email <sup> * </sup></p>
                    <input type="email" name="email" required  placeholder="enter your email" >
                </div>
                <div class ="input-field">
                    <p>your password <sup> * </sup></p>
                    <input type="password" name="pass" required  placeholder="enter your password" >
                </div>
                <div class ="input-field">
                    <p>confirm your password <sup> * </sup></p>
                    <input type="password" name="cpass" required  placeholder="confirm your password " >
                </div>
                <input type="submit" value="register now" name="submit" class="btn">
                <p>already have an account <a href ="login.php">login now </a></p>
            </form>
        </section>
    </div>
</body>
</html>