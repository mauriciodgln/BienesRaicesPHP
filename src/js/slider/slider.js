
// Slide anuncios

function slide() {

  const anuncios = [...document.querySelectorAll('.anuncio')];
  const preFlechaTablet = document.querySelector('.flecha-izq');
  const nxtFlechaTablet = document.querySelector('.flecha-der');
  const preFlechaTelefono = document.querySelector('.flechas .flecha-izq');
  const nxtFlechaTelefono = document.querySelector('.flechas .flecha-der');

  // Anuncios mostrados en celular

  function anunciosPhone() {

    let valores = [];

    preFlechaTelefono.addEventListener('click', () => {

      anuncios.forEach( (item, i) => {

        valores[i] = item.attributes.class.value;

        if(valores[i].includes('display')) {
          anuncios[i].classList.remove('display')

          if(i == 1) {
            anuncios[0].classList.add('display')
          }

        } else if (valores[--i] === 'anuncio') {
          i++;
          anuncios[i].classList.add('display')
        } else {
          i++;
        }

      });
      
      console.log(valores);

    });

    nxtFlechaTelefono.addEventListener('click', () => {

      anuncios.forEach( (item, i) => {

        valores[i] = item.attributes.class.value;

        if(valores[i].includes('display')) {
          anuncios[i].classList.remove('display')

          if(i == 2) {
            anuncios[0].classList.add('display')
          }

        } else if (valores[--i] === 'anuncio display') {
          i++;
          anuncios[i].classList.add('display')
        } else {
          i++;
        }

      });
      
      console.log(valores);

    }); 

  }

  // Anuncios mostrados en tablet

  function anunciosTablet() {

    let valores = [];

    preFlechaTablet.addEventListener('click', () => {

      anuncios.forEach( (item, i) => {

        valores[i] = item.attributes.class.value;

        if(valores[i].includes('display')) {

          if(valores[i].includes('mover') || valores[--i] === undefined) {

            if(valores[i] === undefined) {
              i++;
            }
            if(valores[i].includes('acomodar')) {
              anuncios[i].classList.remove('acomodar');
              anuncios[i].classList.remove('display');
              anuncios[i].classList.remove('mover');
            } else {
              anuncios[i].classList.remove('mover');
              anuncios[i].classList.add('acomodar');
            }
          } else {
            i++
            anuncios[i].classList.remove('display');
            anuncios[i].classList.remove('acomodar');
            anuncios[i].classList.remove('mover');
          }
        
        } else {
          anuncios[i].classList.add('display');
          anuncios[i].classList.add('mover');
        }

      });
    
    });

    nxtFlechaTablet.addEventListener('click', () => {

      anuncios.forEach( (item, i) => {

        valores[i] = item.attributes.class.value;

        if(valores[i].includes('display')) {

          if(valores[i].includes('mover') || valores[--i] === undefined) {

            if(valores[i] === undefined) {
              i++;
            }
            if(valores[i].includes('acomodar')) {
              anuncios[i].classList.remove('acomodar');
              anuncios[i].classList.add('mover');
            } else {
              anuncios[i].classList.remove('display');
              anuncios[i].classList.remove('mover');
            }
          } else {
            i++
            anuncios[i].classList.add('display');
            anuncios[i].classList.remove('acomodar');
            anuncios[i].classList.add('mover');
          }
        
        } else {
          anuncios[i].classList.add('display');
          anuncios[i].classList.add('acomodar');
        }

      });
    
    });

  }

  // Cantidad de anuncios mostrados dependiendo ancho de pantalla

  function windowAnuncios() {
    if(window.innerWidth < 768) {
      anuncios[0].classList.add('display');
      anuncios[1].classList.remove('display');
      anuncios[2].classList.remove('display');
      anunciosPhone();
    } else if (window.innerWidth < 1080) {
      anuncios[0].classList.add('display');
      anuncios[1].classList.add('display');
      anuncios[2].classList.remove('display');
      anunciosTablet();
    } else {
      anuncios[0].classList.add('display');
      anuncios[1].classList.add('display');
      anuncios[2].classList.add('display');
    }
  }

  windowAnuncios();

  window.addEventListener('resize', () => {
    windowAnuncios();
  });  

}

slide();