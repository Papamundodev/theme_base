document.addEventListener("DOMContentLoaded", () => {
  console.log("DOMContentLoaded");
  /**
   * header.php
   * Header toggle
   */
  const headerToggleBtn = document.querySelector(".header-toggle");

  function headerToggle() {
    document.querySelector("#header").classList.toggle("header-show");
    headerToggleBtn.classList.toggle("bi-list");
    headerToggleBtn.classList.toggle("bi-x");
  }
  headerToggleBtn.addEventListener("click", headerToggle);

  /**
   * navbar.php
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll(".navmenu .toggle-dropdown").forEach((navmenu) => {
    navmenu.addEventListener("click", function (e) {
      e.preventDefault();
      this.parentNode.classList.toggle("active");
      this.parentNode.nextElementSibling.classList.toggle("dropdown-active");
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   * if page has selector .page-preloaderthen the preloader will appear for 1000ms
   * if not , then no loader will be shown
   */
  const preloader = document.querySelector("#preloader");
  if (preloader) {
    setTimeout(() => {
      preloader.remove();
    }, 500);
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector(".scroll-top");

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100
        ? scrollTop.classList.add("active")
        : scrollTop.classList.remove("active");
    }
  }
  scrollTop.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });

  window.addEventListener("load", toggleScrollTop);
  document.addEventListener("scroll", toggleScrollTop);

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      new Swiper(swiperElement, config);
    });
  }

  if (window.innerWidth > 768) {
    window.addEventListener("load", initSwiper);
  }

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      once: true,
      startEvent: "DOMContentLoaded",
      useClassNames: true,
      disableMutationObserver: false,
      offset: 50,
      delay: 0,
      easing: "ease",
      mirror: false,
      disable: function () {
        return window.innerWidth < 768;
      },
    });
  }

  // Initialiser AOS immédiatement et aussi lors du chargement de la page
  aosInit();
  window.addEventListener("load", aosInit);

  const logo = document.querySelector(".header");

  window.addEventListener(
    "scroll",
    () => {
      if (window.scrollY > 150) {
        logo.classList.add("hide");
      } else {
        logo.classList.remove("hide");
      }
    },
    { passive: true }
  );

  const dropdownItems = document.querySelectorAll(".dropdown-item");

  dropdownItems.forEach((item) => {
    item.addEventListener("click", () => {
      dropdownItems.forEach((item) => {
        item.classList.remove("active-link");
      });
      item.classList.add("active-link");
    });
  });

  console.log("test");
  //end of the page
});
