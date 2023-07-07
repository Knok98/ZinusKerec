<?php
require '../../controllers/adminFunc.php';
include '../adminHeader.php';
require '../../zinaAPI.php';

$database = new DbContact();
start();
?>
<link rel='stylesheet' href='../../../css/adminStyles.css  '>
<div class="container">
<div class="input-group mb-4">
  <input type="text" class="form-control mt-5" id="myInput" placeholder="Vyhledat" onkeyup="myFunction()"/>
</div>
  <table class="table" id="myTable">
    <thead>
      <tr>
      <th scope="col">řada</th>
        <th scope="col">id</th>
        <th scope="col">kategorie</th>
        <th scope="col">jméno</th>
        <th scope="col">email</th>
        <th scope="col">zpráva</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>

  <?php
  $count=1;
  $sql="SELECT * FROM client_message ORDER BY id";
  foreach ($database->process($sql,"all") as $row) {

          echo "<tr>";
          echo  "<th scope='row'>".$count."</th>";
          echo  "<td>". $row["id"] . "</td>";
          echo  "<td>". $row["category"] . "</td>";
          echo  "<td>". $row["name"] . "</td>";
          echo  "<td>". $row["email"] . "</td>";
          echo  "<td>". $row["body"] . "</td>";
          $item=$row["id"];
          echo  "<td><a href=../../controllers/msgDel.php?id='" . $item . "' class='fa-solid fa-circle-xmark'></a></td>";

          echo "</tr>";
          $count++;
      }
      ?>
      </tbody>
  </table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
for (i = 1; i < tr.length; i++) {
  td = tr[i];
  if (td) {
    txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}
}
</script>