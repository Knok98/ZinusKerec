<?php 
    require '../controllers/adminFunc.php';
    include 'adminHeader.php';
    start();
?>
<link rel='stylesheet' href='../../css/adminStyles.css  '>   
<nav id='menu'>
    <div class="CMS">
        <div class="link">
            <a href='gallery/adminGal.php'>Galerie</a>
        </div>
        <div class="link">
            <a href='shop/adminShop.php'>Eshop</a>
        </div>
        <div class="link">
            <a href='contactForm/adminForm.php'>Formulář</a>
        </div>
    </div>
        <a href="LogReg/adminReg.php">Nový uživatel</a>
        <a href="LogReg/adminLogout.php">Odhlásit se</a>
    </nav>
    
</body>
</html>