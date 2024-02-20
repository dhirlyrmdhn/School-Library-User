<?php

include "../src/server/config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - signup</title>
    <link rel="stylesheet" href="../src/style/dashboardd.css">
    <link rel="stylesheet" href="../src/style/global.css">
    <link rel="stylesheet" href="../src/style/stylee.css">
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

    <div id="container" class="column padding-medium gap-medium">
        <header id="header" class="width flex space-between">
            <div class="flex row gap-medium center-parent">
                <div id="logo-user" class="circle"></div>
                <!-- <span>
                    Dhirly Ramadhan
                </span> -->
            </div>
            <span class="flex gap-small center-parent">
                <span id="input-search" class="flex gap center-parent">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                    <input type="text" placeholder="Search">
                </span>
                <span class="material-symbols-outlined">
                    light_mode
                </span>
                <span class="material-symbols-outlined">
                    notifications
                </span>
            </span>
        </header>
        <div class="width flex row">
            <main id="main" class="flex-1 column ">
                <div class="flex column gap-medium">
                    <!-- <span class="text-typography">
                        Happy Reading, Dhirly!
                    </span> -->
                    <span>
                    </span>
                    <div class="flex row gap-large" id="card-container">
                        <?php
                        $no = 0;
                        $query = "SELECT * FROM data_admin";
                        $sql = mysqli_query($conn, $query);
                        foreach ($sql as $tampil) {
                            $no++;
                            if ($no <= 4) {
                                ?>
                                <div class="column flex gap-medium">
                                    <div class="card card-book"></div>
                                    <span>
                                        <?= $tampil['NAMA'] ?>
                                    </span>
                                </div>
                                <?php
                            }
                            ?>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </main>
            <aside id="aside" class=""></aside>
        </div>
    </div>

    <script src="../src/script/themes.js"></script>
    <script src="../src/script/app.js"></script>

</body>

</html>