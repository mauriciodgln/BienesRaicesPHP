
// Menú en Teléfono

function menuDesplegado() {
  const menuMobile = document.querySelector('.navegacion-mobile');
  const navDesktop = document.querySelector('.navegacion-desktop');
  const html = document.querySelector('html');

  menuMobile.addEventListener('click', () => {
    
    // Efecto menú telefono
    menuMobile.classList.toggle('activo');
    // Desplegar menú en telefono
    navDesktop.classList.toggle('activo');
    // Bloquear scroll
    html.classList.toggle('no-scroll');
    html.classList.toggle('no-scroll-long');

    window.addEventListener('resize', () => {

      if(window.innerWidth >= 768) {
        menuMobile.classList.remove('activo');
        navDesktop.classList.remove('activo');
        html.classList.remove('no-scroll');
        html.classList.remove('no-scroll-long');
      }
    });
    
  });
}

menuDesplegado();

