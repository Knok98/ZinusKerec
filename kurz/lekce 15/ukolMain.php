<?php
include 'header.php';
start();
?>
<div class='upload'>
    <p>Vložte obrázek dle výběru</p>
    <form action="upload.php"enctype="multipart/form-data" method='post'>
        <input type='file' name='upload'>
        <button type='submit'>nahrát</button>
    </form>
</div>

<form action='processMain.php' method='post' >
    <input type='text'value='logoff' hidden>
    <button name='submit' >odhlásit</button>
</form>






</body>

</html>