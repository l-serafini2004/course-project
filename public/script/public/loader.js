window.addEventListener("load", () =>{

    const loader = document.getElementById("loader");
    loader.classList.add("--loader");

    document.getElementById("loader").addEventListener("transitionend", () =>{
        loader.remove()
    })
})