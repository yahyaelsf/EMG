document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('news-container');
    const items = container.children;

    // Duplicate the news items to create a continuous loop effect
    container.innerHTML += container.innerHTML;
});