
// Gli slots
var slots = document.getElementById("slots");

var bookHours = document.getElementById("hours-to-book");

// Elementi
var inputHours = document.createElement("input");

slots.addEventListener('click', function (event) {
    var elemento = event.target.id;

    if(event.target.classList.contains('slot')) return;

    // Controlla se la data è già stata inserita
    if(document.getElementById(elemento).classList.contains("red")) return;
    else if(document.getElementById(elemento).classList.contains("yellow")){
        document.getElementById(elemento).classList.remove("yellow");
        document.getElementById(elemento).classList.add("green");

        let ora = document.getElementById(elemento).innerHTML.trim();
        document.getElementById(ora).remove();

    }else {
        document.getElementById(elemento).classList.remove("green");
        document.getElementById(elemento).classList.add("yellow");

        // Crea l'input
        inputHours.setAttribute("id", event.target.innerHTML.trim())
        inputHours.setAttribute("type", "text");
        inputHours.setAttribute("class", "multipleHours");
        inputHours.setAttribute("readonly", "");
        inputHours.setAttribute("name", "orari[]");
        inputHours.setAttribute("value", event.target.innerHTML.trim());

        // Aggiungi
        bookHours.appendChild(inputHours.cloneNode());
    }



})