document.querySelector('.settings button').addEventListener('click',e=>{
    e.target.classList.toggle("rotate");

})
document.querySelector('.settings button').addEventListener('blur',e=>{
    e.target.style.transform="rotate(0)"
})