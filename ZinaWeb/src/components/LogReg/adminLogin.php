<?php
require '../../controllers/adminFunc.php';
include '../adminHeader.php';
session_start();
?>

<link rel='stylesheet' href='../../../css/adminStyles.css'>
<div class="formHolder">
    <form action='../../controllers/adminLogProces.php' method='post' class=" d-flex justify-content-center bg-light">
        <div class="row mb-2 w-50">
            <label for="name" class="col-sm-2 col-form-label">Jméno</label>
            <input type="text" class="form-control" name='username' placeholder="jméno" />
        </div>
        <div class="row mb-4 w-50">
            <label for="pass" class="col-sm-2 col-form-label">Heslo</label>
            <input type='password' name='password' class="form-control" placeholder='heslo'>
        </div>
        <div class='errWind text-danger'>
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
            error('0', 'Úspěšně odhlášeno');
            error('2', 'Pro přístup je nutné zadat heslo');
            ?>

        </div>
        <button type="submit" name="submit" class="btn btn-primary">odeslat</button>


    </form>
</div>



</body>

</html>