// funcion para reemplazar contenido
function replaceContent(contenido) {
  var contenedor = document.querySelector('#altImages');
  contenedor.innerHTML = contenido;
}


// se ejecuta esta función desde el href de la vista
function ajaxDelete( filename, token, content ) {
  content = typeof content !== 'undefined' ? content : 'content'

  console.log(token);

  // iniciamos ajax
  var xhttp = new XMLHttpRequest();
  // Le decimos al objeto que cuando cambia su estado (tiene 4 estados, el que nos importa es le 4to) corra la función.
  xhttp.onreadystatechange = function(){
    // Si el estado es el 4to (significa que recibimos datos y la rta está lista) y el status (http) es 200 (q significa que todo está perfecto) hacemos algo.

    // me está rompiendo acá
    if(this.readyState == 4 && this.status == 200){
      // Guardamos en una variable, this(se refiere a xhttp de arriba).responseText que nos devuelve el json. Usando JSON.parse() lo convertimos en objeto.
      var contenido = this.responseText;
      //la siguiente linea es para cuando traigo un JSON de algun lado tipo consumo de API
      // var contenido = JSON.parse(this.responseText);
      //mi codigo va a partir de acá. HACER ALGO CON LA INFO QUE VIENE
      replaceContent(contenido);
    };
  };

  //define si traigo(GET) o  si llevo (POST) y a qué dirección
  // filename es lo que traemos de la vista en este caso es ajaxLoad(url)
  xhttp.open("POST", filename);
  // pone en la request el csrf token
  xhttp.setRequestHeader('x-csrf-token', token);
  //envia la petición
  xhttp.send();

  // //define si traigo(GET) o  si llevo (POST) y a qué dirección
  // // filename es lo que traemos de la vista en este caso es ajaxLoad(url)
  // xhttp.open("GET", filename);
  // //pone en request que es una petición AJAX
  // xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  // //envia la petición
  // xhttp.send();
};
