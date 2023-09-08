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
        <h1>Admin panel</h1>
        <form class="admin" target="frame" method="POST" action="../php/add.php">
            <row>
                <column>
                    <div class="input-text">Titel</div>
                    <div class="input-text">Beschrijving</div>
                    <div class="input-text">Datum</div>
                    <div class="input-text">URL</div>
                    <div class="input-text">Foto URL</div>
                    <div class="input-text">Categorie</div>
                </column>
                <column>
                    <input type="text" placeholder="Titel" name="title" />
                    <input type="text" placeholder="Beschrijving" name="desc" />
                    <input type="text" placeholder="datum" name="datum" />
                    <input type="text" placeholder="URL" name="url" />
                    <input type="text" placeholder="Foto URL" name="image" />
                    <select name="category" id="cato">
                        <option value="Persoonlijk">Persoonlijk</option>
                        <option value="School">School</option>
                    </select>
                    <input type="submit" value="Toevoegen" />
                </column>
            </row>
            <div class="checkAnimation"></div>
        </form>
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

            if (isset($_POST['delete_project'])) {
                $projectId = $_POST['delete_project'];
                $db = new MyDB();
                $sql = "DELETE FROM Projecten WHERE id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindValue(':id', $projectId, SQLITE3_INTEGER);
                $stmt->execute();
                $db->close();
            }

            $sql = <<<EOF
    SELECT * from Projecten WHERE category='persoonlijk';
EOF;

            $db = new MyDB();

            $ret = $db->query($sql);
            while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                echo "<project class='admin' >";
                echo "<img loading='lazy' src='{$row['image']}'>";
                echo "<row class='space-between'>";
                echo "<div class='title'>{$row['title']}</div>";
                echo "<div class='date'>{$row['datum']}</div>";
                echo "</row>";
                echo "<div class='desc'>{$row['desc']}</div>";
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='delete_project' value='{$row['id']}'>";
                echo "<button type='submit'><img class='trash' src='../media/trash.svg'ß></button>";
                echo "</form>";
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
                echo "<project class='admin' >";
                echo "<img loading='lazy' src='{$row['image']}'>";
                echo "<row class='space-between'>";
                echo "<div class='title'>{$row['title']}</div>";
                echo "<div class='date'>{$row['datum']}</div>";
                echo "</row>";
                echo "<div class='desc'>{$row['desc']}</div>";
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='delete_project' value='{$row['id']}'>";
                echo "<button type='submit'><img class='trash' src='../media/trash.svg'ß></button>";
                echo "</form>";
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
    <iframe id="none" name="frame"></iframe>

</body>

</html>