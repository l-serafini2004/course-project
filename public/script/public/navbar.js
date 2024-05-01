const navSlide = () =>{
  const burger = document.getElementById("burger");
  const navlink = document.getElementById("navlink");

  burger.addEventListener("click", function(){
      navlink.classList.toggle("nav-active");
      burger.classList.toggle("toggle")
  })

  
  
}

navSlide();