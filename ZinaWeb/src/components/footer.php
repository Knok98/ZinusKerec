<nav class='footer'>
        <p id="copR"></p>
</nav>


<script>
        document.getElementById("copR").addEventListener("onload",cop())
        function cop(){
        const date = new Date();
        document.getElementById("copR").innerHTML="&copy2023-"+date.getFullYear()+" Knok98";
        }
</script>