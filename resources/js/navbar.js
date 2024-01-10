document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('loginregistermodal');
    var navbar = document.querySelector('.navbar');

    // Quando il modale si apre
    modal.addEventListener('show.bs.modal', function() {
        // Rimuovi la classe 'fixed-top' dalla navbar
        navbar.classList.remove('fixed-top');
    });

    // Quando il modale viene nascosto
    modal.addEventListener('hide.bs.modal', function() {
        // Aggiungi la classe 'fixed-top' alla navbar
        navbar.classList.add('fixed-top');
    });
});
