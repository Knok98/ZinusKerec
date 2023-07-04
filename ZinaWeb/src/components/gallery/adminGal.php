<?php
require '../../controllers/adminFunc.php';
include '../adminHeader.php';
require '../../zinaAPI.php';

$database = new DbGall();
start();
?>
<link rel='stylesheet' href='../../../css/adminStyles.css  '>
<div class='upload'>
    <p>Vložte obrázek dle výběru</p>
    <form class="uploadImg"action="../../controllers/uploadGal.php" enctype="multipart/form-data" method='post'>
        <input type='file' name='upload'>
        <button type='submit'>nahrát</button>
        
    </form>
    <div class='errWind'>
        <?php
        if (isset($_GET['iid'])) {
            if (isset($_SESSION[$_GET['iid']])) {
                $error = json_decode($_SESSION[$_GET['iid']]);
                foreach ($error as $err) {
                    echo "<div>" . $err . "</div>";
                }
                unset($_SESSION[$_GET['iid']]);
            }
        }
        error('7','obrázek smazán');
        ?>
    </div>
</div>
<div id='gallery'>
    <?php
    foreach ($database->getAll() as $row) {

        echo "<div class='pic'>";
        echo  "<a target='_blank' href='../" . $row["odkaz"] . "'>";
        echo "<img src='../" . $row["odkaz"] . "'></a>";
        echo "<a href=../../controllers/imgDel.php?id='" . $row["id"] . "'>Smazat</a>";
        echo "</div>";
    }

    ?>
</div>

</html>
</body>