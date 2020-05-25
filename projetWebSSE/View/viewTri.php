<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./View/style/header.css" />
    <link rel="stylesheet" href="./View/style/formulaires.css" />
    <link rel="stylesheet" href="./View/style/viewTri.css" />
    <link rel="stylesheet" href="./View/style/main.css" />
</head>

<body>
    <?php
    include("./View/header.php");
    include("./View/viewInterface.php");

    ?>
    <div id="mainDiv">
    <h2>Tri</h2>
    <div id="elt" tabindex="0">
        <div id="vue_tri">
            <div class="lit" id="lit1" tabindex="0" ></div>
            <div class="patient" id="patient1" tabindex="2">
                <h5>Patient 1</h5>
                <form id="form_patient1">
                    <?php
                        include 'formPatientViewTri.php'
                    ?>
                </form>
            </div>
            <div class="lit" id="lit2" tabindex="1"></div>
            <div class="patient" id="patient2" tabindex="2">
                <h5>Patient 2</h5>
                <form id="form_patient2">
                    <?php
                        include 'formPatientViewTri.php'
                    ?>
                </form>
            </div>
        </div>
    </div>
  </div>
    <script>
        document.getElementById("lit1").onfocus= function(){
            document.getElementById("patient1").style.display="block";
            document.getElementById("patient2").style.display="none";

        }

        document.getElementById("lit2").onfocus= function(){
            document.getElementById("patient2").style.display="block";
            document.getElementById("patient1").style.display="none";
        }

        document.getElementById("elt").onfocus= function(){
            document.getElementById("patient2").style.display="none";
            document.getElementById("patient1").style.display="none";
        }
    </script>

</body>
</html>
