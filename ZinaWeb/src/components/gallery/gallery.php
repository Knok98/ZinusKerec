<link rel="stylesheet" href="../../css/gallery.css" />
<?php
require 'C:\xampp\htdocs\ZinaWeb\src\zinaAPI.php';
?>
<section class="main">
        <div id='gallery'>
                <?php
                $database = new DbGall();

                foreach ($database->getAll() as $row) {
                        echo "<div class='pic'>";
                        echo  "<a target='_blank' href='" . $row["odkaz"] . "'>";
                        echo "<img src='" . $row["odkaz"] . "'></a>";
                        echo "</div>";
                }

                ?>
        </div>
</section>