window.onload = function()
{
  setInterval(getData, 1000*5);
}


function getData() {
  fetch('/projetwebsse/refresh', { method: 'GET', headers: {"Content-Type": "text/json"}}).then(function(response) {
  response.json().then(function(parties)
  {
    var div = document.getElementById('testRefresh');
    div.innerHTML = '';
    if(parties['partieJoueur'] != '')
    {
      var partieJoueur = parties['partieJoueur'];
      var table1 = document.createElement("TABLE");
      table1.id = partieJoueur.id;
      table1.classList.add("tabPartie");

      var thead = table1.createTHead("THEAD");
      var rowHead = thead.insertRow();
      var th = document.createElement("TH");
      th.textContent = partieJoueur.id,
      th.colSpan = 2;
      rowHead.appendChild(th);
      var tBody = document.createElement("TBODY");

      var rowForms = document.createElement("TR");
      var tdJoin = rowForms.insertCell();
      var tdLeave = rowForms.insertCell();

      var nbJoueurs = Object.keys(partieJoueur.joueurs).length;
      var rowNbJoueurs = document.createElement('TR');
      var tdNbJoueurs = rowNbJoueurs.insertCell();
      tdNbJoueurs.textContent = nbJoueurs+"/7";
      tdNbJoueurs.colSpan = 2;
      tBody.appendChild(rowNbJoueurs);

      var formulaireJoin = document.createElement("FORM");
      formulaireJoin.action="join";
      formulaireJoin.method= "POST";
      formulaireJoin.classList.add("formJoin");

      var input= document.createElement('INPUT');
      input.setAttribute("type", "hidden");
      input.name = "idGame";
      input.value = partieJoueur.id;
      formulaireJoin.appendChild(input);

      var btnJoin = document.createElement("BUTTON");
      btnJoin.type = "submit";
      btnJoin.disabled = true;
      btnJoin.classList.add("btn-formulaires");
      btnJoin.textContent = "Rejoindre";
      formulaireJoin.appendChild(btnJoin);
      tdJoin.appendChild(formulaireJoin);

      var formulaireQuit = document.createElement("FORM");
      formulaireQuit.action="quit";
      formulaireQuit.method= "POST";
      formulaireQuit.classList.add("formJoin");

      var input= document.createElement('INPUT');
      input.setAttribute("type", "hidden");
      input.name = "idGame";
      input.value = partieJoueur.id;
      formulaireQuit.appendChild(input);

      var btnQuit = document.createElement("BUTTON");
      btnQuit.type = "submit";
      btnQuit.disabled = false;
      btnQuit.classList.add("btn-cancel");
      btnQuit.textContent = "Quitter";
      formulaireQuit.appendChild(btnQuit);
      tdLeave.appendChild(formulaireQuit);

      tBody.appendChild(rowForms);

      for(joueur in partieJoueur.joueurs)
      {
        var rowJoueur = document.createElement('TR');
        var tdRole = rowJoueur.insertCell();
        tdRole.textContent = partieJoueur.joueurs[joueur].role;
        var tdLogin = rowJoueur.insertCell();
        tdLogin.textContent = partieJoueur.joueurs[joueur].login;
        tBody.appendChild(rowJoueur);
      }


      table1.appendChild(tBody);
      div.appendChild(table1);
    }

    for(var j=0; j < parties['parties'].length; j++)
    {
      var table = document.createElement("TABLE");
      table.id = parties['parties'][j].id;
      table.classList.add("tabPartie");

      var thead = table.createTHead("THEAD");
      var rowHead = thead.insertRow();
      var th = document.createElement("TH");
      th.textContent = parties['parties'][j].id,
      th.colSpan = 2;
      rowHead.appendChild(th);
      var tBody = document.createElement("TBODY");

      var rowForms = document.createElement("TR");
      var tdJoin = rowForms.insertCell();
      var tdLeave = rowForms.insertCell();

      var nbJoueurs = Object.keys(parties['parties'][j].joueurs).length;
      var rowNbJoueurs = document.createElement('TR');
      var tdNbJoueurs = rowNbJoueurs.insertCell();
      tdNbJoueurs.textContent = nbJoueurs+"/7";
      tdNbJoueurs.colSpan = 2;
      tBody.appendChild(rowNbJoueurs);

      var formulaireJoin = document.createElement("FORM");
      formulaireJoin.action="join";
      formulaireJoin.method= "POST";
      formulaireJoin.classList.add("formJoin");

      var input= document.createElement('INPUT');
      input.setAttribute("type", "hidden");
      input.name = "idGame";
      input.value = parties['parties'][j].id;
      formulaireJoin.appendChild(input);

      var btnJoin = document.createElement("BUTTON");
      btnJoin.type = "submit";
      if(parties['partieJoueur'] != '')
      {
        btnJoin.disabled = true;
      }
      else {
        btnJoin.disabled = false;
      }
      btnJoin.classList.add("btn-formulaires");
      btnJoin.textContent = "Rejoindre";
      formulaireJoin.appendChild(btnJoin);
      tdJoin.appendChild(formulaireJoin);

      var formulaireQuit = document.createElement("FORM");
      formulaireQuit.action="quit";
      formulaireQuit.method= "POST";
      formulaireQuit.classList.add("formJoin");

      var input= document.createElement('INPUT');
      input.setAttribute("type", "hidden");
      input.name = "idGame";
      input.value = parties['parties'][j].id;
      formulaireQuit.appendChild(input);

      var btnQuit = document.createElement("BUTTON");
      btnQuit.type = "submit";
      btnQuit.disabled = true;
      btnQuit.classList.add("btn-cancel");
      btnQuit.textContent = "Quitter";
      formulaireQuit.appendChild(btnQuit);
      tdLeave.appendChild(formulaireQuit);

      tBody.appendChild(rowForms);

      for(joueur in parties['parties'][j].joueurs)
      {
        var rowJoueur = document.createElement('TR');
        var tdRole = rowJoueur.insertCell();
        tdRole.textContent = parties['parties'][j].joueurs[joueur].role;
        var tdLogin = rowJoueur.insertCell();
        tdLogin.textContent = parties['parties'][j].joueurs[joueur].login;
        tBody.appendChild(rowJoueur);
      }


      table.appendChild(tBody);
      div.appendChild(table);
    }


  });
  }).catch(function(error) {
    console.log(error);
    // En cas d'erreur
  });

}
