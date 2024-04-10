function toggleMenu() {
    var menuItems = document.getElementById("menuItems");
    menuItems.style.display = menuItems.style.display === "block" ? "none" : "block";
}

// Toggle the sidebar on mobile view
document.querySelector('.hamburger-menu').addEventListener('click', function() {
    document.querySelector('.sidebar').style.display = document.querySelector('.sidebar').style.display === 'block' ? 'none' : 'block';
});
