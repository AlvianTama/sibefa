const saklar = document.querySelector('.saklar input');
const nav = document.querySelector('nav ul');

saklar.addEventListener('click', function(){
    nav.classList.toggle('slide');
});