let themeButton = document.getElementById('theme-button');

themeButton.addEventListener('click',()=>{
    if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
        document.documentElement.setAttribute('data-bs-theme','');
        themeButton.classList.remove('fa-moon');
        themeButton.classList.add('fa-sun');

    }
    else {
        document.documentElement.setAttribute('data-bs-theme','dark');
        themeButton.classList.add('fa-moon');
        themeButton.classList.remove('fa-sun');
    }
})