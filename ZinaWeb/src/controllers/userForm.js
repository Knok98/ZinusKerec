function CustomAlert(){
    this.alert = function(message,title){
      document.body.innerHTML = document.body.innerHTML + '<div id="dialogoverlay"></div><div id="dialogbox" ><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div>';
  
      let dialogoverlay = document.getElementById('dialogoverlay');
      let dialogbox = document.getElementById('dialogbox');
      
      let winH = window.innerHeight;
      dialogoverlay.style.height = winH+"px";
      
      dialogbox.style.top = "100px";
  
      dialogoverlay.style.display = "block";
      dialogbox.style.display = "block";
      
      document.getElementById('dialogboxhead').style.display = 'block';
  
      if(typeof title === 'undefined') {
        document.getElementById('dialogboxhead').style.display = 'none';
      } else {
        document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+ title;
      }
      document.getElementById('dialogboxbody').innerHTML = message;
      document.getElementById('dialogboxfoot').innerHTML = '<button class="pure-material-button-contained active" onclick="customAlert.ok()">OK</button>';
    }
    
    this.ok = function(){
      document.getElementById('dialogbox').style.display = "none";
      document.getElementById('dialogoverlay').style.display = "none";
    }
  }
  
  let customAlert = new CustomAlert();

  function res(){
    document.getElementById("user").value="";
    document.getElementById("email").value="";
    document.getElementById("message").value="";
    document.getElementById("terms").checked = false;
  }

  $(document).ready(function () {
    $("form").submit(function (event) {
      
     
      var formData = {
        user: $("#user").val(),
        email: $("#email").val(),
        message: $("#message").val(),
        contactPurpose: $("#contactPurpose").val(),
      };
  console.log(formData);
      $.ajax({
        type: "POST",
        url: "../controllers/processForm.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
        res();
        if (!data.success) {
          customAlert.alert('Jejda, něco tu chybí...')
           
          } else {
            
            customAlert.alert('Děkujeme za Vaši zprávu')
   
          }})
        event.preventDefault();
      });
    
    
    });