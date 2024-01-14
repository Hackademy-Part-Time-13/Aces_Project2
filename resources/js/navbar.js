document.addEventListener('DOMContentLoaded', function() {
    let modal = document.getElementById('loginregistermodal');
    let navbar = document.querySelector('.modalnav');
    let main = document.querySelector('main');

    // Quando il modale si apre
    modal.addEventListener('show.bs.modal', function() {
        // Rimuovi la classe 'fixed-top' dalla navbar
        navbar.classList.remove('fixed-top');
        main.classList.remove('mt-5');
        main.classList.add('position-header');
    });

    // Quando il modale viene nascosto
    modal.addEventListener('hide.bs.modal', function() {
        // Aggiungi la classe 'fixed-top' alla navbar
        navbar.classList.add('fixed-top');
        main.classList.add('mt-5');
        main.classList.remove('position-header');
    });
});
