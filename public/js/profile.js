let introcount = document.querySelector("#description");
let wordcount = 0;
introcount.addEventListener("keyup", () => {
    wordcount = introcount.value.length;
    document.querySelector("#textcount").innerHTML = wordcount - 33;
});
