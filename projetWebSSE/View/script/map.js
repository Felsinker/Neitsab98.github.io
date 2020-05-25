let inner = document.getElementById("map");

function setCoords(e, type) {
  let idX = type + "X";
  let idY = type + "Y";
 
  document.getElementById(idX).innerText = e[idX];
  document.getElementById(idY).innerText = e[idY];
}
 function update(e) {
  setCoords(e, "offset");
}

inner.addEventListener("mouseenter", update, false);
inner.addEventListener("mousemove", update, false);
inner.addEventListener("mouseleave", update, false);

function pion(){
	haut = document.getElementById("offsetX").innerText - 5;
	gauche = document.getElementById("offsetY").innerText - 5;

	let b = document.body;
let cir = document.createElement('div');
cir.setAttribute('class','cercle');
cir.setAttribute('style','position: absolute; top: '+gauche+'px; left: '+haut+'px;');
b.append(cir);
}
