@extends('layouts.frontLayout')

@section('content')
  <div class="main">
    <img class="image" src=" {{ asset('images/le_me.jpg') }}" alt="studio">
    <div class="text">
      @if (App::isLocale('en'))
        <p>
          Hi! My name is Ana Pfefferkorn, I was born in Vicente Lopez on March 21, 1988. I am a Graphic Designer graduated from UBA in 2015 although I started studying Clothing Design and then I changed. Some of my work from that stage can be found in the "Projects" tab. I have also been a Fullstack Web Developer at Digital House since 2017. In this course I learned CSS, HTML5, Javascript, how to use GIT, PHP, Laravel repositories, how to make AJAX requests, a bit of SASS, a bit of REACT and to work with Agile Methodologies.
        </p>
        <br>
        <p>
          Since 2008 I have been working with my family at Repuestos Mitre, a family business that sells spare parts for household appliances where I am in charge of customer service, both via WhatsApp and MercadoLibre, product photography and the creation of publications. In 2008 I worked as a receptionist and telephone operator in a commercial production company, Banana Films, and in 2011 I worked as an assistant in a graphic design studio, Imagenzero. Also, for some years I have been working as a freelance graphic designer.
        </p>
        <br>
        <p>
          I consider myself a restless and passionate person. I like to learn things almost constantly, I am currently learning German. I did many courses such as handmade screen printing, crochet, Chinese embroidery, classic embroidery focused on illustration, marbling on fabric, handmade serography, photography and black and white laboratory, manual development of c-41 color film, studio lighting, digital photographic editing, lingerie (mold, use of machines).
        </p>
        <br>
        <p>
          I made this page using references and adapting it to what I was needing. I am using Laravel as Framework, CSS and Javascript written by me. On home I implemented AJAX requests. This and other projects can be found on my github:
          <a style="color:coral" href="https://github.com/anapfe/ "> github.com/anapfe/ </a>
        </p>
      @elseif (App::isLocale('cat'))

      @else
        <p>
          Hola! Mi nombre es Ana Pfefferkorn, nací en Vicente Lopez en 1988. Soy Diseñadora Gráfica de la UBA aunque empecé cursando Diseño de Indumentaria y después me cambié. En la pestaña "Proyectos» puse algunos de los trabajos que más me gustaron. También soy Desarrolladora Web Fullstack de DigitalHouse desde 2017. En este curso aprendí CSS, HTML5, Javascript, a usar repositorios GIT, PHP, Laravel, a hacer peticiones AJAX, un poco de SASS, otro poco de REACT y a trabajar con Metodologías Ágiles.
        </p>
        <br>
        <p>
          Desde 2008 trabajo con mi familia en Repuestos Mitre, una empresa familiar que comercializa repuestos electrodomésticos donde me encargo de la atención al cliente, tanto por whatsapp como por MercadoLibre, de la fotografía de los productos y de la creación de las publicaciones. En 2008 trabajé como recepcionista y telefonista en una productora de comerciales, Banana Films, y en 2011 trabajé como asistente en un estudio de Diseño gráfico, Imagenzero. También, desde hace algunos años trabajo como diseñadora gráfica de forma freelance.
        </p>
        <br>
        <p>
          Me considero una persona inquieta y apasionada. Me gusta aprender cosas casi de forma constante, actualmente estoy aprendiendo Aleman y me sigo formando en desarrollo web. Hice muchos cursos como ser serigrafía artesanal, crochet, bordado chino, bordado clásico enfocado a ilustración, marmolado sobre tela, serografía artesanal, fotografía y laboratorio blanco y negro, revelado manual de película color c-41, iluminación en estudio, edición fotográfica digital y lencería (moldería, uso de máquinas). Casi constantemente tengo side projects que me mantienen activa y creativa.
        </p>
        <br>
        <p>
          Esta página la hice usando referentes y adaptándola a lo que estaba necesitando. Estoy usando Laravel como Framework, CSS y Javascript escritos por mí. En la home implementé peticiones AJAX. Tiene un usuario administrador y uso bases de datos MySQL. Este y otros proyectos se pueden encontrar en mi github:
          <a style="color:coral" href="https://github.com/anapfe/ ">github.com/anapfe/</a>
        </p>
        <br>
        <p>
          Elegí este nombre porque de muy chica escuché el concepto «República Bananera» e inmeditamente me dio curiosidad, no podía entender cómo juntar dos palabras buenas daba «malo». Eran dos palabras de buen significado, la república y las bananas que es una de las frutas más consumidas alrededor del globo.
        </p>
        <br>
        <p>
          Hoy por hoy el concepto se utiliza peyorativamente para referirse a los países de América Latina desde una visión totalmente primermundista en el cuál se tira un manto sobre ellos para referirse a que somos políticamente inestables, empobrecidos, atrasados, tercermundistas, corruptos y pobres*. Si nos preguntamos por qué los países «bananeros» cayeron en semejante desgracia para mí hay una sola respuesta, saqueos y desestabilizaciones propinadas a lo largo de los siglos por ese Primer Mundo que tanto admiramos.
          </p>
          <br>
          <p>
            Con recorrer un poco nuestra hermosa latinoamérica podemos ver que sí, muchas de esas heridas están abiertas y que nos cuesta horrores cerrar pero también podemos encontrar maravillas en todo lo largo y ancho de nuestra Patria Grande. Hay muchísimas riquezas como el cacao, las bananas, el petróleo, el café, y tantos otros recursos que solo se encuentran en las «repúblicas bananeras». Entonces si le sacamos el polvo primermundista al término podemos darnos cuenta que la «república banananera» es una república muy rica, y tiene algunos de los paisajes más hermosos del mundo, las cataratas más altas y grandes, los pulmones selváticos más grandes, mares critalinos y así, muchos más. Entonces ahí es donde me gusta romper. Si dejamos de permitir que nos nombren, recuperar el concepto es recuperar identidad y la república bananera es mucho más.
          </p>
          <br>
          <p>
            También me gusta el concepto porque a mí de chica me dijeron mucho «Ana Banana» y me molestaba, me hacía sentir humillada y no encontraba forma de no hacerlo. Creo que en los caminos de superación que transitamos durante la vida, lograr resignificar cosas que nos hacían daño es uno de los grandes superpoderes. Hay que abrazar los insultos y convertirlos en algo que nos sirva.
          </p>
          <br>
          <p>
            Por eso «República Bananera» es un concepto que quiero rescatar, «Ana» es un nombre que quiero rescatar y el primero incluye de alguna forma el segundo. Apropiarse de lo que nos hace daño nos hace recontruirnos. A mí me hace pensar en lo que soy, lo que hago, lo que aprendo y lo que puedo llegar a ser.
          </p>
          <br>
          <p>
            *Wikipedia
          </p>
        @endif
      </div>
    </div>

  @endsection
