// Theme Toggler
(function() {
    // Update icon based on current theme
    function updateThemeIcon(theme) {
        const themeIcon = document.getElementById('theme-icon');
        if (themeIcon) {
            if (theme === 'dark') {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            } else {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }
        }
    }
    
    // Toggle theme between light and dark
    window.toggleTheme = function() {
        const currentTheme = document.documentElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        document.documentElement.setAttribute('data-bs-theme', newTheme);
        updateThemeIcon(newTheme);
    };
    
    // Initialize icon based on default theme
    document.addEventListener('DOMContentLoaded', function() {
        const currentTheme = document.documentElement.getAttribute('data-bs-theme');
        updateThemeIcon(currentTheme);
    });
})();

