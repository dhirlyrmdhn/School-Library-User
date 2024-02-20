<?php include '../src/server/config.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - signup</title>
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
        <form method="post">
            <div id="content-container" class="flex width height center-parent">
                <div class="content flex gap-large column">
                    <div class="flex width gap-small column">
                        <div>
                            <div id="logo-user" class="circle"></div>
                        </div>
                        <div class="flex column">
                            <span class="text-title">Create an account</span>
                            <span>already have an account? <a href="../login/">login</a></span>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        $firstname = $_POST['first-name'];
                        $lastname = $_POST['last-name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $configpassword = $_POST['config-password'];
                        $passwordlength = strlen($password);

                        if ($passwordlength < 8) {
                            echo '<span class="error">Password must containt atleast 8 character</span>';
                        } else {
                            if ($password === $configpassword) {
                                echo '<span class="success">Your account has been successfully created</span>';
                                $query = "INSERT INTO data_admin (`NAMA`, `EMAIL`, `PASSWORD`, `KONTAK`, `ALAMAT`, `HAK`) VALUES ('$firstname $lastname', '$email', '$password', '', '', '');";
                                $sql = mysqli_query($conn, $query);
                                header("Location: ../login/");
                            } else if ($password != $configpassword) {
                                echo '<span class="error">Your password configuration is wrong</span>';
                            }
                        }
                    }
                    ?>

                    <div class="flex width column gap-medium" id="form">
                        <div class="row gap-medium flex width">
                            <div class="flex column flex-1 width">
                                <label for="">First Name</label>
                                <input required type="text" class="width padding-small" name="first-name">
                            </div>
                            <div class="flex column flex-1 width">
                                <label for="">Last Name</label>
                                <input required type="text" class="width padding-small" name="last-name">
                            </div>
                        </div>
                        <div class="row gap-medium flex width">
                            <div class="flex column flex-1 width">
                                <label for="">Email address</label>
                                <input required type="text" class="width padding-small" name="email">
                            </div>
                        </div>
                        <div class="column flex width gap-small">
                            <div class="row gap-medium flex width">
                                <div class="flex column flex-1 width">
                                    <label for="">Password</label>
                                    <input required type="password" class="width padding-small password" name="password"
                                        id="password">
                                </div>
                                <div class="flex column flex-1 width">
                                    <label for="">Confirm your password</label>
                                    <input required type="password" class="width padding-small password" name="config-password"
                                        id="config-password">
                                </div>
                            </div>
                            <div class="flex column width gap-small">
                                <label for="">Use 8 or more characters with a mix of letters, numbers & symbols</label>
                                <div class="row flex width center-parent justify-content-start">
                                    <input id="check" name="check" type="checkbox" onclick="showPassword()">
                                    <label for="check">Show password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="width flex row space-between">
                        <span>
                            <a href="../login/">Login instead</a>
                        </span>
                        <button class="cta padding-small" name="submit">Create account</button>
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
            </div>
        </form>
    </div>

    <script src="../src/script/themes.js"></script>
    <script src="../src/script/app.js"></script>

</body>

</html>