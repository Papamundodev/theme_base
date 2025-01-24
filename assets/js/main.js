document.addEventListener('DOMContentLoaded', () => {
    console.log('DOMContentLoaded');
  /**
   * header.php 
   * Header toggle
   */
  const headerToggleBtn = document.querySelector('.header-toggle');

  function headerToggle() {
    document.querySelector('#header').classList.toggle('header-show');
    headerToggleBtn.classList.toggle('bi-list');
    headerToggleBtn.classList.toggle('bi-x');
  }
  headerToggleBtn.addEventListener('click', headerToggle);

  /**
   * navbar.php
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });


   /**
    * Preloader
    * if page has selector .page-preloaderthen the preloader will appear for 1000ms
    * if not , then no loader will be shown 
    */
   const preloader = document.querySelector('#preloader');
   if (preloader) {
     setTimeout(() => {
       preloader.remove();
     }, 500);
   }

      /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);


    /**
   * Init swiper sliders
   */
    function initSwiper() {
      document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
        let config = JSON.parse(
          swiperElement.querySelector(".swiper-config").innerHTML.trim()
        );
  
        if (swiperElement.classList.contains("swiper-tab")) {
          initSwiperWithCustomPagination(swiperElement, config);
        } else {
          new Swiper(swiperElement, config);
        }
      });
    }
  
    window.addEventListener("load", initSwiper);

      /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      once: true,
      startEvent: 'DOMContentLoaded',
    });
  }
  window.addEventListener('load', aosInit);

  // Gestion du stockage de l'image de profil
  const profileImg = document.querySelector('.profile-image'); // Ajustez le sélecteur selon votre HTML
  
  if (profileImg) {
    const imgUrl = profileImg.src;
    
    // Vérifie si l'image est déjà en cache
    const cachedImgUrl = sessionStorage.getItem('profileImageUrl');
    
    if (cachedImgUrl) {
      profileImg.src = cachedImgUrl;
    } else {
      // Stocke l'URL dans le sessionStorage
      sessionStorage.setItem('profileImageUrl', imgUrl);
    }
  }

  const logo = document.querySelector('.header');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 150) {
      logo.classList.add('hide');
    } else {
      logo.classList.remove('hide');
    }
  }, { passive: true });


  //end of the page
});
