<?php 
    include 'adminHeader.php';
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
        ?>
    </div>
    <div id='gallery'>
        <?php 
            $rowcount=countPic();
            $con=mysqli_connect("localhost","root","","zinuskerec");
            for($x=1;$x<=$rowcount;$x++){
                
                $sqlquery=mysqli_query($con,"SELECT odkaz from gallery where `id`=$x");
                $row=mysqli_fetch_array($sqlquery,MYSQLI_ASSOC);
                echo '<a target="_blank" href=$row["odkaz"]></a>';
                echo '<img=$row["odkaz"]>';
            }
        ?>
    </div>
</div>

</html>
</body>