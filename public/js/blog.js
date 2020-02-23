//hamburger and menu
(function() {
    let ham = document.querySelector(".hamburger");
    ham.addEventListener("click", () => {
        let bar1 = document.querySelector("#bar1");
        let bar2 = document.querySelector("#bar2");
        let bar3 = document.querySelector("#bar3");
        bar1.classList.toggle("bar1imp");
        bar2.classList.toggle("bar2imp");
        bar3.classList.toggle("bar3imp");
        let nav = document.querySelector(".nav");
        nav.classList.toggle("openbar");
    });
})();
