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
        <p>
          Hola! El meu nom ??s Ana Pfefferkorn, vaig n??ixer a Vicente Lopez el 21 de mar?? de 1988. S??c Dissenyadora Gr??fica graduada de l'UBA en 2015 tot i que vaig comen??ar cursant Disseny d'Indument??ria i despr??s em vaig canviar. Alguns dels meus treballs d'aquesta etapa es poden trobar a la pestanya "proyetos". Tamb?? s??c Desenvolupadora Web Fullstack de Digital House des 2017. En aquest curs vaig aprendre CSS, HTML5, Javascript, a fer servir repositoris GIT, PHP, Laravel, a fer peticions AJAX, una mica de SASS, un altre poc de REACT i a treballar amb Metodologies ??gils.
        </p>
        <br>
        <p>
          Des de 2008 treball amb la meva fam??lia a Recanvis Mitre, una empresa familiar que comercialitza recanvis electrodom??stics on m'encarrego de l'atenci?? a client, tant per WhatsApp com per MercadoLibre, de la fotografia dels productes i de la creaci?? de les publicacions. El 2008 vaig treballar com a recepcionista i telefonista en una productora de comercials, Banana Films, i el 2011 vaig treballar com a assistent en un estudi de Disseny gr??fic, Imagenzero. Tamb??, des de fa alguns anys treball com a dissenyadora gr??fica de forma freelance.
        </p>
        <br>
        <p>
          Em considero una persona inquieta i apassionada. M'agrada aprendre coses gaireb?? de forma constant, actualment estic aprenent Aleman i. vaig fer molts cursos com ser serigrafia artesanal, ganxet, brodat xin??s, brodat cl??ssic enfocat a il??lustraci??, marbre sobre tela, serograf??a artesanal, fotografia i laboratori blanc i negre, revelat manual de pel??l??cula color c-41, il??luminaci?? en estudi, edici?? fotogr??fica digital, llenceria (molder??a, ??s de m??quines).
        </p>
        <br>
        <p>
          Aquesta p??gina la vaig fer usant referents i adaptant-la al que estava necessitant. Estic usant Laravel com Framework, CSS i Javascript escrits per mi. A la home vaig implementar peticions AJAX. Aquest i altres projectes es poden trobar en el meu github:
          <a style="color:coral" href="https://github.com/anapfe/ ">github.com/anapfe/</a>
        </p>
      @else
        <p>
          Hola! Mi nombre es Ana Pfefferkorn, nac?? en Vicente Lopez el 21 de marzo de 1988. Soy Dise??adora Gr??fica graduada de la UBA en 2015 aunque empec?? cursando Dise??o de Indumentaria y despu??s me cambi??. Algunos de mis trabajos de esa etapa se pueden encontrar en la pesta??a "Proyectos". Tambi??n soy Desarrolladora Web Fullstack de Digital House desde 2017. En este curso aprend?? CSS, HTML5, Javascript, a usar repositorios GIT, PHP, Laravel, a hacer peticiones AJAX, un poco de SASS, otro poco de REACT y a trabajar con Metodolog??as ??giles.
        </p>
        <br>
        <p>
          Desde 2008 trabajo con mi familia en Repuestos Mitre, una empresa familiar que comercializa repuestos electrodom??sticos donde me encargo de la atenci??n al cliente, tanto por whatsapp como por MercadoLibre, de la fotograf??a de los productos y de la creaci??n de las publicaciones. En 2008 trabaj?? como recepcionista y telefonista en una productora de comerciales, Banana Films, y en 2011 trabaj?? como asistente en un estudio de Dise??o gr??fico, Imagenzero. Tambi??n, desde hace algunos a??os trabajo como dise??adora gr??fica de forma freelance.
        </p>
        <br>
        <p>
          Me considero una persona inquieta y apasionada. Me gusta aprender cosas casi de forma constante, actualmente estoy aprendiendo Aleman y me sigo formando en desarrollo web. Hice muchos cursos como ser serigraf??a artesanal, crochet, bordado chino, bordado cl??sico enfocado a ilustraci??n, marmolado sobre tela, serograf??a artesanal, fotograf??a y laboratorio blanco y negro, revelado manual de pel??cula color c-41, iluminaci??n en estudio, edici??n fotogr??fica digital, lencer??a (molder??a, uso de m??quinas).
        </p>
        <br>
        <p>
          Esta p??gina la hice usando referentes y adapt??ndola a lo que estaba necesitando. Estoy usando Laravel como Framework, CSS y Javascript escritos por m??. En la home implement?? peticiones AJAX. Tiene un usuario administrador y uso bases de datos MySQL. Este y otros proyectos se pueden encontrar en mi github:
          <a style="color:coral" href="https://github.com/anapfe/ ">github.com/anapfe/</a>
        </p>
      @endif
    </div>
    <img class="image" src=" {{ asset('images/studio.jpg') }}" alt="studio">
  </div>

@endsection
