function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}

function request(callback) {
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
          callback(xhr.responseText);

        }
    };
    if(document.querySelector('input[name="destinataire"]:checked') != null)
    {
      xhr.open("GET", "./View/ChatF/script/get-message.php?action=" + document.querySelector('input[name="destinataire"]:checked').value, true);
      xhr.send(null);
    }

}

function notif(callback) {
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
          callback(xhr.responseText);
        }
    };
    if(document.querySelector('input[name="destinataire"]:checked')!= null)
    {
      xhr.open("GET", "./View/ChatF/script/get-notif.php?action=" + document.querySelector('input[name="destinataire"]:checked').value, true);
      xhr.send(null);
    }

}

function change(sData) {
    if (sData.length > 0) {
      document.getElementById('notif').innerHTML = sData;
    }

}
setInterval('notif(change)',500);

function readData(sData) {
    if (sData.length > 0) {
      document.getElementById('cadre_chat').innerHTML = sData;
    }
    else {
    document.getElementById('cadre_chat').innerHTML = '<center><b>Pas de messages pour le moment.</b></center>';
    }
}
setInterval('request(readData)',500);


function post() {
  var xhr = getXMLHttpRequest();
  console.log("oui");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            //callback(xhr.responseText);
         //write(msg);
        }
    };
    var msg = encodeURIComponent(document.getElementById("message").value);
      xhr.open("GET", "./View/ChatF/script/post.php?message=" + msg + "&action=" + document.querySelector('input[name="destinataire"]:checked').value, true);
      xhr.send(null);

      document.getElementById("message").value = '';
      }
