window.addEventListener('load', function() {

  //hamburguesa
  let btn = document.querySelector('.menu-hamburger');
  btn.onclick = function() {
    document.querySelector(".menu-items").classList.toggle("show-menu");
    let hamburg = document.querySelector('.menu-hamburger');

    if ( hamburg.innerHTML.includes('<i class="fa fa-times" aria-hidden="true"></i>')) {
      hamburg.innerHTML = '<i class="fa fa-bars" aria-hidden="true"></i>';
    } else {
      hamburg.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    };
  };
  // fin hamburguesa

  //inicio scroll to top
  let backTop = document.querySelector('#backTop');
  let prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
    let currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      backTop.style.opacity = "0";
      backTop.style.visibility = "hidden";
    } else {
      backTop.style.opacity = "1";
      backTop.style.visibility = "visible";
    }
    prevScrollpos = currentScrollPos;
  }
  /// When the user clicks on the button, scroll to the top of the document
  backTop.onclick = function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  // fin scroll to top -------------------------------------------

  // inicio project caption-------------------------------------------
  let projectCaption = document.querySelectorAll('.project-caption');
  projectCaption.forEach(function(element)
  {
    element.addEventListener('mouseover', function() {
      let parent = element.parentElement;
      let child = parent.children[1];
      child.classList.add('show-caption');
    });
  });

  projectCaption.forEach(function(element)
  {
    element.addEventListener('mouseout', function() {
      element.classList.remove('show-caption');
    });
  });
  // fin project caption -----------------------------------------------

  // inicio current menu-------------------------------------------
  try {
    let currentUrl = window.location.href;
    let menuItem = document.querySelectorAll(".menu-item");
    menuItem.forEach(function(element) {
      let child = element.children[0];
      let menuUrl = child.href;
      let menuWord = child.innerHTML;
      // if (currentUrl === menuUrl || currentUrl.includes(menuWord) && !currentUrl.includes('es')) {
      if (currentUrl === menuUrl || currentUrl.includes(menuWord) && !currentUrl.includes('es')) {
        child.classList.add('current-url');
      };
    });
  } catch(error) {
  };
  // fin current page menu -------------------------------------------

  // inicio masonry --------------------------------------------------
  const imgs = document.querySelectorAll('.project-img');
  imgs.forEach(function(e) {
    imgHeight = e.naturalHeight;
    imgWidth = e.naturalWidth;
    projectCard = e.parentElement.parentElement;
    if (imgWidth > imgHeight) {
      projectCard.style.gridRow = 'span 2';
    } else if (imgWidth < imgHeight) {
      projectCard.style.gridRow = 'span 4';
    } else {
      projectCard.style.gridRow = 'span 3';
    };
  });
  // fin masonry ----------------------------------------------------

  // ojito login
  try {

    let togglePassBtn = document.querySelector('#eye');

    function togglePass() {
      let passInput = document.querySelector('#password');
      if (passInput.type === "password") {
        passInput.type = "text";
        togglePassBtn.className = 'far fa-eye-slash';
      } else {
        passInput.type = "password";
        togglePassBtn.className = 'far fa-eye';
      }
    }

    togglePassBtn.onclick = togglePass;

  } catch {
  }

  try {
    // make clickeable links
    let projectNode = document.querySelector('.project-text');
    let projectText = projectNode.innerHTML;

    // projectNode.innerHTML = 'HOLA';
    let pattern = /^((http|https|ftp):\/\/)/;
    // verficar si tiene link
    if(projectText.search(pattern)) {
      // guardar el link
      let url = projectText.substring(
        projectText.lastIndexOf('https://'),
        projectText.lastIndexOf('/') + 1,
      );
      // obtener el texto de la url
      let urlText = url.substring(
        url.lastIndexOf('https://') + 8,
        url.lastIndexOf('/'),
      );
      // obtener el texto solo sin la url
      let txt = projectText.replace(url, '');
      // construir el html del a
      let newUrl = '<a class="project-link" href="' + url + '" target="_blank">' + urlText + '</a>';
      let newInnerHtml = txt + newUrl;
      // modificar el inner html
      projectNode.innerHTML = newInnerHtml;
    };
  } catch {

  }

});
