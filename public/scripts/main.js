document.addEventListener('DOMContentLoaded', function() {
    void document.body.offsetWidth;
    let main = document.getElementById('main');
    main.classList.add('loaded');
});



document.querySelectorAll('.item-menu').forEach(itemMenu => {
    
    // 1. Mostrar o popup no mouseenter
    itemMenu.addEventListener('mouseenter', () => {
        // Encontra o popup dentro deste item de menu
        const popup = itemMenu.querySelector('#menu-popup');
        
        // Adiciona a classe 'visible' para exibir
        if (popup) {
            popup.classList.add('visible');
        }
    });

    // 2. Esconder o popup no mouseleave
    itemMenu.addEventListener('mouseleave', () => {
        const popup = itemMenu.querySelector('#menu-popup');
        
        // Remove a classe 'visible' para esconder
        if (popup) {
            popup.classList.remove('visible');
        }
    });
});