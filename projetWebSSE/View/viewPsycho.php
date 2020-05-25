<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="uxpin_pma.css">
  </head>
  <body>
    <div id="mainDiv">
    <div id="elt">
		 <div id= "morgue">
			  <p id="titre">Psycho</p>
        <!--bouton pour aller à la page UR-->
        <form action="viewUR.php" method="POST">
        <input type="submit" value="UR" class="btn_UR"/>
        </form>
        <!-- bouton pour aller à la page UA-->
			  <form action="viewUA.php" method="POST">
        <input type="submit" value="UA" class="btn_Psy"/>
        </form>
			  <div id="tableau">
          <div id="icon-humain-1" onclick="move(1)">
              <div id="myProgress">
                  <div id="myBar1">
                  </div>
              </div>
          </div>
          <div id="icon-humain-2" onclick="move(2)">
              <div id="myProgress">
                  <div id="myBar2">
                  </div>
              </div>
          </div>
          <div id="icon-humain-3" onclick="move(3)">
              <div id="myProgress">
                  <div id="myBar3">
                  </div>
              </div>
          </div>
          <div id="carre-1" onclick="move(4)">
              <div id="myProgress">
                  <div id="myBar4">
                  </div>
              </div>
          </div>
          <div id="carre-2" onclick="move(5)">
              <div id="myProgress">
                  <div id="myBar5">
                  </div>
              </div>
          </div>
          <div id="carre-3" onclick="move(6)">
              <div id="myProgress">
                  <div id="myBar6">
                  </div>
              </div>
          </div>
			</div>
		 </div>
  </div>
  </div>

  <script>
  var i = 0;
  function move(valeur) {
    if (i < 6) {
      i ++;
      switch (valeur){
        case 1:
            var elem = document.getElementById("myBar1");
          break;
        case 2:
            var elem = document.getElementById("myBar2");
          break;
        case 3:
            var elem = document.getElementById("myBar3");
          break;
        case 4:
            var elem = document.getElementById("myBar4");
          break;
        case 5:
            var elem = document.getElementById("myBar5");
          break;
        case 6:
            var elem = document.getElementById("myBar6");
        break;
      }
      var width = 1;
      var id = setInterval(frame, 30);
      function frame() {
        if (width >= 100) {
          clearInterval(id);
          i --;
        } else {
          width++;
          elem.style.width = width + "%";
        }
      }
    }
  }
  </script>
  </body>
</html>
