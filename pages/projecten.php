<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Djay | GLR 2023</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/projecten.js"></script>
</head>

<body onload="projectenAnimation();">
    <main>
        <nav>
            <nav-buttons id="djaynl">
                <a href="https://djay.nl/">
                    <nav-button class="blue no-left-padding"> <span class="material-symbols-outlined">
                            public
                        </span>Djay.nl</nav-button></a>
            </nav-buttons>
            <nav-buttons>
                <a href="../index.html"><nav-button>Home</nav-button></a>
                <a href="projecten.php"><nav-button id="selected">Projecten</nav-button></a>
                <a href="contact.php"><nav-button class="no-right-padding">Contact</nav-button></a>
                <a href="about.html"><nav-button>About</nav-button></a>
            </nav-buttons>

        </nav>
        <text class="margin130px">
        </text>
        <h1>Projecten</h1>
        <br />
        <h2>Persoonlijk</h2>
        <h3 class="full-width">Mijn eigen projecten, elk project hiervan heb ik alleen gemaakt in mijn vrije tijd.</h3>

        <projects>
            <?php
            class MyDB extends SQLite3
            {
                function __construct()
                {
                    $this->open('../dbs/database.db');
                }
            }

            $sql = <<<EOF
        SELECT * from Projecten WHERE category='persoonlijk';
        EOF;

            $db = new MyDB();

            $ret = $db->query($sql);
            while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                echo "<project onclick=\"window.open('{$row['url']}', '_blank')\">";
                echo "<img loading='lazy' src='../media/logos/{$row['image']}'>";
                echo "<row class='space-between'>";
                echo "<div class='title'>{$row['title']}</div>";
                echo "<div class='date'>{$row['datum']}</div>";
                echo "</row>";
                echo "<div class='desc'>{$row['desc']}</div>";
                echo "</project>";
            }
            $db->close();
            ?>
        </projects>
        <h2>School projecten</h2>
        <h3 class="full-width">Deze projecten zijn gemaakt voor een verplichte of vrijwillige opdracht voor Grafisch
            Lyceum Rotterdam.</h3>

        <projects>
            <?php

            $sql = <<<EOF
        SELECT * from Projecten WHERE category='school';
        EOF;

            $db = new MyDB();

            $ret = $db->query($sql);
            while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                echo "<project onclick=\"window.open('{$row['url']}', '_blank')\">";
                echo "<img loading='lazy' src='../media/logos/{$row['image']}'>";
                echo "<row class='space-between'>";
                echo "<div class='title'>{$row['title']}</div>";
                echo "<div class='date'>{$row['datum']}</div>";
                echo "</row>";
                echo "<div class='desc'>{$row['desc']}</div>";
                echo "</project>";
            }
            $db->close();
            ?>
        </projects>
        <footer class="relative">
            © 2023 <a target="_blank" href="https://djay.nl/">Djay.nl</a>, All rights
            reserved.
        </footer>
    </main>
</body>

</html>