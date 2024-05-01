
var container = document.getElementById('container');
var deletewin = document.getElementById('del-window');
var closebutton = document.getElementById('close');
var idInput = document.getElementById('id');
var nameacc = document.getElementById('nameacc');

container.addEventListener('click', function (event) {
    var elementoID = event.target.id;
    var elementoEmail = event.target.innerHTML;


    if(event.target.classList.contains('db')) return;

    if(deletewin.classList.contains('cancella-profilo')) return;
    else{
        deletewin.classList.add('cancella-profilo');
        deletewin.classList.remove('--visible');
        idInput.value = elementoID;
        nameacc.innerHTML = "Account: " + elementoEmail;
    }

})


closebutton.addEventListener('click', () =>{
    deletewin.classList.add('--visible');
    deletewin.classList.remove('cancella-profilo');
    idInput.value = "";
})