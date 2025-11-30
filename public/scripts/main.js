document.addEventListener('DOMContentLoaded', function() {
    void document.body.offsetWidth;
    let main = document.getElementById('main');
    main.classList.add('loaded');
});

document.querySelectorAll('.item-menu-desktop').forEach(itemMenu => {
    
    itemMenu.addEventListener('mouseenter', () => {
        const popup = itemMenu.querySelector('.menu-desktop-popup'); 
    
        if (popup) {
            popup.classList.add('visible');
        }
    });

    itemMenu.addEventListener('mouseleave', () => {
        const popup = itemMenu.querySelector('.menu-desktop-popup');
        
        if (popup) {
            popup.classList.remove('visible');
        }
    });
});

document.getElementById('menu-mobile-icon').addEventListener('click', () => {
    sidebar = document.getElementById('sidebar-mobile');
    sidebar.classList.toggle('visible');
});