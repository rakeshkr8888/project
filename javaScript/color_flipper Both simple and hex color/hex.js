const colors=[1,2,3,4,5,6,7,8,9,"A","B", "C","D","E","F"];
const btn=document.getElementById("btn");
const color=document.getElementById("color");
window.addEventListener("load",function(){
    let hex="#";
    // console.log("hello");
    for(let i=0;i<6;i++){
        let a=Math.random();
        // console.log(a*colors.length);
        hex=hex+colors[Math.floor(a*colors.length)];
        // console.log(hex);
    }
    // console.log(hex);
    document.body.style.background=hex;
    color.textContent=hex;
})
btn.addEventListener("click",function(){
    // console.log("helo world");
    let hex="#";
    for(let i=0;i<6;i++){
        let a=Math.random();
        // console.log(a*colors.length);
        hex=hex+colors[Math.floor(a*colors.length)];
        // console.log(hex);
    }
    // console.log(hex);
    document.body.style.background=hex;
    color.textContent=hex;
});