        var menuBtn = document.getElementById("menuBtn")
        var sideNav = document.getElementById("sideNav")
        var menu = document.getElementById("menu")

        sideNav.style.right == "-225px";

        menuBtn.onclick = function(){
            if(sideNav.style.right == "-225px"){
                sideNav.style.right = "0";
                menu.src = "images/close.png";
            }
            else{
                sideNav.style.right = "-225px";
                menu.src = "images/menu.png";
            }
        }
        var scroll = new SmoothScroll('a[href*="#"]', {
	    speed: 750,
	    speedAsDuration: true
});