<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('head.php');
    ?>

</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : false;

    switch ($page) {
        case 'menu':
            include('menu.php');
            break;

        case 'gallery':
            include('gallery/gallery.php');
            break;

        case 'booking':
            include('ContactForm/booking.php');
            break;

        case 'shop':
            include('shop/shop.php');
            break;

        default:
            include('menu.php');
    }

    include('footer.php');
    ?>
    
</body>

</html>