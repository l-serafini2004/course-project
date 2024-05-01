// Profilo
var profilo = document.getElementById("select-profilo");
var _profilo = document.getElementById("profilo");

profilo.addEventListener('click', () =>{
    if(_profilo.classList.contains("--visible")){
        _profilo.classList.toggle("--visible");
        _profilo.classList.add("other");
    }else{
        _profilo.classList.add("--visible");
        _profilo.classList.toggle("other");
    }
})


// Utenti
var utenti = document.getElementById("select-utenti");
var _utenti = document.getElementById("utenti");

utenti.addEventListener('click', () =>{
    if(_utenti.classList.contains("--visible")){
        _utenti.classList.toggle("--visible");
        _utenti.classList.add("other");
    }else{
        _utenti.classList.add("--visible");
        _utenti.classList.toggle("other");
    }
})