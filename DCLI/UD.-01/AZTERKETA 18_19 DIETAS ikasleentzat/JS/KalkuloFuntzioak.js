var dietasArr = [5,14,10];
var precioKm = 0.45;
var precioHora = 25;
var letraTam = 25;

function dietas() {
    var dietas = document.getElementsByName("dietak");
    var total= 0;
   
    for (let i = 0; i < dietas.length; i++) {
        const aux = dietas[i];
        const precioDieta = dietasArr[i];
        if (aux.checked) {
            total += precioDieta;
        } else {
            
        }
    
    }
    document.getElementById("totalDietak").innerHTML = total;
    sumarTodo()
}

function viajesKm() {
    var kilometros = document.getElementById("km").value;
    var regex = new RegExp("[0-9]");
    var match = regex.test(kilometros);
    if (match) {
        if (kilometros > 200) {
            document.getElementById("imagenKMerror").style.display = "inline";
        }else{
            document.getElementById("imagenKMerror").style.display = "none";
            sumarViajes()
        }
    } else {
        var kilometros = document.getElementById("km").value = "";
        alert("Tienes que introducir un nuemro del 0 al 9!");
        sumarViajes()
    }
    
}

function viajesHoras() {
    var horas = document.getElementById("orduakBidaiak").value;
    var regex = new RegExp("[0-9]");
    var match = regex.test(horas);
    if (match) {
        if (horas > 300) {
            document.getElementById("imagenORDUAKerror").style.display = "inline";
        } else {
            document.getElementById("imagenORDUAKerror").style.display = "none";
            sumarViajes()
        }
    } else {
        var horas = document.getElementById("orduakBidaiak").value = "";
        alert("Tienes que introducir un nuemro del 0 al 9!");
        sumarViajes()
    }
    
}

function sumarViajes() {
    var precioViajes;
    var kilometros = document.getElementById("km").value;
    var horas = document.getElementById("orduakBidaiak").value;

    var precioHoras = 0;
    var precioKilometros = 0;

    precioHoras = (precioHora * horas)

    precioKilometros = (precioKm * kilometros);

    precioViajes = precioKilometros + precioHoras;
    document.getElementById("totalBidaiak").innerHTML = precioViajes;
    sumarTodo();
}

function sumarTodo() {
    var precio = 0;
    var viajes = document.getElementById("totalBidaiak").innerHTML;
    var dietas = document.getElementById("totalDietak").innerHTML;



    precio = parseInt(viajes) + parseInt(dietas);

    document.getElementById("total").innerHTML = precio;
}

function garbitu() {
    var dietas = document.getElementsByName("dietak");
    dietas.forEach(aux => {
        aux.checked = false;
    });
    document.getElementById("totalDietak").innerHTML = 0;
    document.getElementById("km").value = "";
    document.getElementById("orduakBidaiak").value = "";
    document.getElementById("totalBidaiak").innerHTML = 0;
    document.getElementById("total").innerHTML = 0;
    document.getElementById('totalDietak').style.fontSize = "25px";
    document.getElementById('totalBidaiak').style.fontSize = "25px";
    document.getElementById('total').style.fontSize = "25px";

}

function handitu() {
    //https://stackoverflow.com/questions/38627822/increase-the-font-size-with-a-click-of-a-button-using-only-javascript
    //Lo he conseguido de aquí

    var aumentar1 = document.getElementById('totalDietak');
    var aumentar2 = document.getElementById('totalBidaiak');
    var aumentar3 = document.getElementById('total');
    style = window.getComputedStyle(aumentar1, null).getPropertyValue('font-size');

    currentSize = parseFloat(style);
    if (currentSize >= 40) {
        
    } else{
        aumentar1.style.fontSize = (currentSize + 2) + 'px';
        aumentar2.style.fontSize = (currentSize + 2) + 'px';
        aumentar3.style.fontSize = (currentSize + 2) + 'px';
    }
}
function txikitu() {
    //https://stackoverflow.com/questions/38627822/increase-the-font-size-with-a-click-of-a-button-using-only-javascript
    //Lo he conseguido de aquí

    var aumentar1 = document.getElementById('totalDietak');
    var aumentar2 = document.getElementById('totalBidaiak');
    var aumentar3 = document.getElementById('total');
    style = window.getComputedStyle(aumentar1, null).getPropertyValue('font-size');

    currentSize = parseFloat(style);
    if (currentSize <= 26) {

    } else {
        aumentar1.style.fontSize = (currentSize - 2) + 'px';
        aumentar2.style.fontSize = (currentSize - 2) + 'px';
        aumentar3.style.fontSize = (currentSize - 2) + 'px';
    }
}