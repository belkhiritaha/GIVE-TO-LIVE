   <div id="plf" class="bg-warning" style="display: none;"><p>Please log in first</p></div>
      



         <script type="text/javascript">
           function logfirst(){
            document.getElementById('plf').style.display = "block";
           }

           
         </script>

          if ($logvar == 0) {
        echo '<button class="btn btn-primary part" id="myAnimation" onclick="logfirst()">Je participe !</button>';
      }