//Fenêtre modale
//Variable contenant l'id d'un camion
    var cam = document.getElementsByClassName("rectangle_camion");

    var idvehicule = 0;

    //Variable contenant l'id d'un hélicoptère
    var hel = document.getElementById("cercle_helico");

    //Variable contenant la fenêtre modale
    var mod = document.getElementById("formDest");

    var currentVehicule;

    //Ouverture de la fenêtre sur un clic de camion
    /*foreach(var c in cam)
    {
        c.onclick = function () {

        }
    }
    cam.onclick = function () {
        mod.style.display = "block";
    }*/

    //Si l'utilisateur clique en dehors de la fenêtre, fermeture de celle-ci
    window.onclick = function (event) {
        if (event.target == mod) {
            mod.style.display = "none";
        }
    }

    function popup(camion, increment) {
        alert(increment); // a suppr
        idvehicule = increment;
        alert(idvehicule); //a suppr
        console.log(camion);
        mod.style.display = "block";
        currentVehicule = camion;
    }

function valideDesti() {
    hel.style.backgroundColor = 'red';
    //document.getElementById(idvehicule).style.backgroundColor = 'red';
    //$("#".idvehicule).css("background-color", "red");
    }
