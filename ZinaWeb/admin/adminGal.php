<?php 
    include 'adminHeader.php';
    require 'database.php';
    $database=new Database();
    start();
?>

    <div class='upload'>
    <p>Vložte obrázek dle výběru</p>
    <form action="uploadGal.php"enctype="multipart/form-data" method='post'>
        <input type='file' name='upload'>
        <button type='submit'>nahrát</button>
    </form>
    <div class='errWind'>
        <?php 
            error('3','Nahrání proběhlo úspěšně');
            error('4','obrázek je příliš velký');
            error('5','Chyba při nahrávání');
            error('6','obrázek není daného typu');
            error('7','obrázek smazán');
        ?>
    </div>
    </div>
    <div id='gallery'>
        <?php 
            foreach($database->getAll()as$row){
                
                    echo "<div class='pic'>";
                    echo  "<a target='_blank' href='".$row["odkaz"]."'>";
                    echo "<img src='".$row["odkaz"]."'></a>";
                    echo "<a href=imgDel.php?id='".$row["id"]."'>Smazat</a>";
                    echo "</div>";
                }
                
        ?>
   </div>

</html>
</body>