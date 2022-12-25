// navBar scroll
window.addEventListener("scroll",()=>{
    document.querySelector("nav").classList.toggle("window-scroll",window.scrollY > 0);
});

const open_menu_btn=document.querySelector("#open_menu_btn");
const close_menu_btn=document.querySelector("#close_menu_btn");
const nav_menu=document.querySelector(".nav_menu");

open_menu_btn.addEventListener("click",()=>{
    nav_menu.style.display="flex";
    open_menu_btn.style.display="none";
    close_menu_btn.style.display="inline-block";
});

close_menu_btn.addEventListener("click",()=>{
    nav_menu.style.display="none";
    close_menu_btn.style.display="none";
    open_menu_btn.style.display="inline-block";
})




// FAQS
const faqs=document.querySelectorAll(".faq");
faqs.forEach((faq)=>{
    faq.addEventListener("click",()=>{
        faq.classList.toggle("open");

        //faq icon
        let icon=faq.querySelector(".faq_icon i")
        if(icon.className=="uil uil-plus"){
            icon.className="uil uil-minus";
        }
        else{
            icon.className="uil uil-plus";
        }
    })
})