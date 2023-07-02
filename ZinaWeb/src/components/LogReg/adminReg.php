<?php

require '../../controllers/adminFunc.php';
include '../adminHeader.php';

?>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<link rel='stylesheet' href='../../../css/adminStyles.css'>
<div class="formHolder">
<form action='../../controllers/adminRegProces.php' method='post' class=" d-flex justify-content-center bg-light">
    <div  class="row mb-2 w-50">
        <label for="name"class="col-sm-2 col-form-label">Přezdívka</label>
        <input type="text" class="form-control" id="name" name='name'placeholder="jméno" />
    </div>
    <div  class="row mb-4 w-50">
        <label for="pass"class="col-sm-2 col-form-label">Heslo</label>
        <input type='password' class="form-control" id='pass' name='pass' placeholder='heslo'>
        <input type='password' class="form-control" id='rewind' name='rewind' placeholder='potvrdit heslo'>
    </div>
    <p id='msg'class="text-danger"></p>
    <button type="submit" class="btn btn-primary">odeslat</button>
</div>

</form>

<script src="../../controllers/validation.js" type="text/javascript"></script>

</body>

</html>