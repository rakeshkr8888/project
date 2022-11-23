const colors=["red","blue", "green", "purple", "yellow", "pink", "grey", "brown", "voilent", "dark blue" ];
const btn=document.querySelector("#btn");
const color=document.getElementById("color");
btn.addEventListener("click", function(){
    // console.log("hello wolr");
    let a=randomfun();
    document.body.style.background=colors[a];
    color.textContent=colors[a];
});
function randomfun(){
    return Math.floor(Math.random()*colors.length);
}
