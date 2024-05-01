
// Openclose
var openclose = document.getElementById('openclose');
var openclose2 = document.getElementById('openclose2');
var aside = document.getElementById('asideid');

var pagefirst = document.getElementById('page-first');

openclose.addEventListener('click', () => {
    aside.classList.add('--visible');
    pagefirst.classList.add('pageall');
    pagefirst.classList.remove('page');
})

openclose2.addEventListener('click', ()=>{
    aside.classList.toggle('--visible');
    pagefirst.classList.add('page');
    pagefirst.classList.remove('pageall');
})

