
document.addEventListener('DOMContentLoaded', function() {
    const userIcon = document.getElementById('user-icon');
    const menu = document.getElementById('menu');

    userIcon.addEventListener('click', function(event) {
        event.preventDefault();
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });

    // Optional: close the menu when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!userIcon.contains(event.target) && !menu.contains(event.target)) {
            menu.style.display = 'none';
        }
    });
});