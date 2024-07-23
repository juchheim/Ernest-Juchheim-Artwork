document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.main-navigation ul');

    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            menu.classList.toggle('toggled');
            const expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
            menuToggle.setAttribute('aria-expanded', !expanded);
        });
    }
});
