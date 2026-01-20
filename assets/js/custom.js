document.addEventListener("DOMContentLoaded", function () {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.main-nav .nav-link');

    navLinks.forEach(link => {
        // Remove active class from all
        link.classList.remove('active');

        // Add active class if href matches current path
        // Handling root path '/' specially
        if (link.getAttribute('href') === '/' && (currentPath === '/' || currentPath === '/index.php' || currentPath.endsWith('/New-PDI/'))) {
            link.classList.add('active');
        } else if (link.getAttribute('href') === currentPath || currentPath.includes(link.getAttribute('href'))) {
            // Basic match for other links (e.g. about.php)
            if (link.getAttribute('href') !== '/') {
                link.classList.add('active');
            }
        }
    });

    // Specific fix for "About PDI" if path ends in about.php
    if (currentPath.includes('about.php')) {
        document.querySelector('a[href="about.php"]').classList.add('active');
    }

});
