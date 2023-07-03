

/*document.getElementById("pass").addEventListener("change", validity);
document.getElementById("rewind").addEventListener("change", rewind);

function elements(str) {
    console.log('regex');

    let pattern = new RegExp(
        "^(?=.*[a-z])(?=.*[A-Z])(?=,*\\d).+$");
    return pattern.test(str);
}

function validity() {
    console.log('validace');
    let password = document.getElementById('pass').value;
    if (password.length > 8) {
        if (!elements(password)) {
            document.getElementById('msg').innerHTML = 'Heslo musí obsahovat velká, malá písmena a čísla';
        }
        else { document.getElementById('msg').innerHTML = ''; }
    } else { document.getElementById('msg').innerHTML = 'Heslo musí obsahovat více jak 8 znaků '; }
}

function rewind() {
    console.log('opakovani');

    let password = document.getElementById('pass').value;
    let passwordRew = document.getElementById('rewind').value;
    if (password == passwordRew) {
        document.getElementById('submit').removeAttribute('disabled');
    }
    else { document.getElementById('msg').innerHTML = 'Hesla se neschoduji'; }
}

function elements(str) {
    console.log('regex');

    let pattern = new RegExp(
        "^(?=.*[a-z])(?=.*[A-Z])(?=,*\\d).+$");
    return pattern.test(str);
}*/

//document.getElementById("submit").addEventListener("onclick", reset);

function reset(){
  const element = document.getElementById("help");
  element.remove();
}

$(document).ready(function () {
    $("form").submit(function (event) {
      $("#pass").removeClass("has-error");
      $("#jmeno").removeClass("has-error");
      $("#suc").removeClass("has-error");
      $(".help-block").remove();
      var formData = {
        name: $("#name").val(),
        pass: $("#pass").val(),
        rewind: $("#rewind").val(),
      };
  
      $.ajax({
        type: "POST",
        url: "../../controllers/adminRegProces.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
        if (!data.success) {
            if (data.errors.name) {
              $("#jmeno").addClass("has-error");
              $("#jmeno").append(
                '<div  class="help-block">' + data.errors.name + "</div>"
              );
            }
    
            if (data.errors.pass) {
              $("#password").addClass("has-error");
              $("#password").append(
                
                '<div  class="help-block">Heslo musí obsahovat alespoň' + data.errors.pass + "<br></div>"
              );
            }
    
            if (data.errors.rewind) {
              $("#password").addClass("has-error");
              $("#password").append(
                '<div  class="help-block">Hesla ' + data.errors.rewind + "<br></div>"
              );
            }
          } else {
            $("#suc").addClass("has-error");
              $("#suc").append(
                '<div  class="help-block">' + data.message + "<br></div>"
              );
          }
    
        });
    
        event.preventDefault();
      });
    
    
    });
  
 