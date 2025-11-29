document.addEventListener('DOMContentLoaded', function() {
    void document.body.offsetWidth;
    let main = document.getElementById('main');
    main.classList.add('loaded');
});

document.querySelectorAll('.item-menu').forEach(itemMenu => {
    
    itemMenu.addEventListener('mouseenter', () => {
        const popup = itemMenu.querySelector('.menu-popup'); 
    
        if (popup) {
            popup.classList.add('visible');
        }
    });

    itemMenu.addEventListener('mouseleave', () => {
        const popup = itemMenu.querySelector('.menu-popup');
        
        if (popup) {
            popup.classList.remove('visible');
        }
    });
});