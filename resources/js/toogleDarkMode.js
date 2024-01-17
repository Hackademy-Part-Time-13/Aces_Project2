let themeButton = document.getElementById('theme-button');
let icon = document.getElementById('theme-icon');

themeButton.addEventListener('click',()=>{
    if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
        document.documentElement.setAttribute('data-bs-theme','');
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');

    }
    else {
        document.documentElement.setAttribute('data-bs-theme','dark');
        icon.classList.add('fa-moon');
        icon.classList.remove('fa-sun');
    }
})