// funcion para reemplazar contenido
function replaceContent(contenido) {
  var contenedor = document.querySelector('#altImages');
  contenedor.innerHTML = contenido;
}

// esta función va siempre igual porque valida la funcion "hacer algo (Request:filename $request:content)"
function ajaxLoad( filename, content ){
  content = typeof content !== 'undefined' ? content : 'content'

  // iniciamos ajax
  var ajax = new XMLHttpRequest();

  // Le decimos al objeto que cuando cambia su estado (tiene 4 estados, el que nos importa es le 4to) corra la función.
  ajax.onreadystatechange = function(){
    // Si el estado es el 4to (significa que recibimos datos) y el status (http) es 200 (de nuevo, significa que todo está perfecto) hacemos algo.
    if(this.readyState == 4 && this.status == 200){
      // Guardamos en una variable, this(se refiere a ajax de arriba).responseText que nos devuelve el json. Usando JSON.parse() lo convertimos en objeto.
      var contenido = this.responseText;
      //la siguiente linea es para cuando traigo un JSON de algun lado tipo consumo de API
      //var contenido = JSON.parse(this.responseText);
      //mi codigo va a partir de acá. HACER ALGO CON LA INFO QUE VIENE
      setTimeout(replaceContent(contenido), 1000);
    };
  };

  //define si traigo(GET) o  si llevo (POST) y a qué dirección
  // filename es la ruta en routes a donde tiene que ir incluidos los paramétros
  ajax.open("GET", filename);
  //le avisa a la página que recibe que es una petición de AJAX
  ajax.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  //envia la petición
  ajax.send();
};
