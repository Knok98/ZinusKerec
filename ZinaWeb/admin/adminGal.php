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
    </div>
    <div id='gallery'>
        <?php 
            $con=mysqli_connect("localhost","root","","zinuskerec");
            if (mysqli_connect_errno()) {
                    die("Conection Error " . mysqli_connect_error());
                }
                
                $sql="SELECT odkaz FROM gallery ORDER BY id";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo "<div class='pic'>";
                    echo  "<a target='_blank' href='".$row["odkaz"]."'>";
                    echo "<img src='".$row["odkaz"]."'></a>";
                    echo "</div>";
                }
                
        ?>
   </div>

</html>
</body>