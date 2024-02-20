<?php include '../src/server/config.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - signin</title>
    <link rel="stylesheet" href="../src/style/global.css">
    <link rel="stylesheet" href="../src/style/style.css">
    <link rel="stylesheet" href="../src/style/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <div id="container">
        <div id="content-container" class="flex width height center-parent">
            <form method="post">
                <div class="content flex gap-large column">
                    <div class="flex width gap-small center-parent column">
                        <div>
                            <div id="logo-user" class="circle"></div>
                        </div>
                    </div>
                    <div class="flex width gap-medium center-parent column">
                        <div class="flex column">
                            <span class="text-title">Log in</span>
                        </div>
                        <?php
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        if (isset($_POST['login'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            $query = "SELECT * FROM data_admin WHERE NAMA = '$username' OR EMAIL = '$username' AND PASSWORD = '$password'";
                            $login = mysqli_query($conn, $query);
                            $cek = mysqli_num_rows($login);

                            if ($cek > 0) {
                                $data = mysqli_fetch_assoc($login);
                                if ($data['PASSWORD'] === $password) {
                                    echo '<div class="width success">Login successfully</div>';
                                    header("Location: ../dashboard/");
                                } else {
                                    echo '<div class="width error">Unable to log in. Please check your username and password.</div>';
                                }
                            } else {
                                echo '<div class="width error">An error occurred. Failed to find your username or email</div>';
                            }
                        }

                        if (isset($_POST['sign'])) {
                            header("Location: ../signup/");
                        }
                        ?>
                        <div class="row gap-medium flex width">
                            <div class="flex column flex-1 width">
                                <label for="">Email or username</label>
                                <input type="text" class="width padding-small" name="username" id="username" required>
                            </div>
                        </div>
                        <div class="row gap-medium flex width">
                            <div class="flex column flex-1 width">
                                <div class="width flex space-between">
                                    <label for="">Password</label>
                                    <span>
                                        <div class="row flex center-parent">
                                            <input id="check" name="check" type="checkbox" onclick="showPassword()">
                                            <label for="check">Show password</label>
                                        </div>
                                    </span>
                                </div>
                                <input type="password" class="width padding-small" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="row gap-medium flex width">
                            <div class="flex column flex-1 width gap-small">
                                <button class="cta padding-small width" id="login" name="login">Log in</button>
                                <label for="">By continuing, you agree to the <a href="">Terms of use</a> and <a
                                        href="">Privacy Policy</a>.</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex width space-between">
                        <span>
                            <a href="">
                                Other issue with log in
                            </a>
                        </span>
                        <span>
                            <a href="">
                                Forgot your password
                            </a>
                        </span>
                    </div>
                    <div class="flex width gap-medium center-parent column">
                        <div class="row gap-medium flex center-parent width">
                            <div class="border-line flex-1"></div>
                            <span>New to our community</span>
                            <div class="border-line flex-1"></div>
                        </div>
                        <a href="../signup/" class="cta center-parent flex padding-small width" name="signin" id="signin">Create account</a>
                    </div>

                    <div class="width flex row space-between">
                        <span>
                            <a href="">Get Help?</a>
                        </span>
                        <div class="flex gap-medium row">
                            <span>Help</span>
                            <span>Privacy</span>
                            <span>Terms</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../src/script/themes.js"></script>
    <script src="../src/script/app.js"></script>
    <script src="../src/script/logout.js"></script>

</body>

</html>