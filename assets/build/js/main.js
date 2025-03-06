(()=>{var __webpack_modules__={"./assets/js/main.js":()=>{eval('document.addEventListener("DOMContentLoaded", function () {\n  console.log("DOMContentLoaded");\n  /**\n   * header.php\n   * Header toggle\n   */\n  var headerToggleBtn = document.querySelector(".header-toggle");\n  function headerToggle() {\n    document.querySelector("#header").classList.toggle("header-show");\n    headerToggleBtn.classList.toggle("bi-list");\n    headerToggleBtn.classList.toggle("bi-x");\n  }\n  headerToggleBtn.addEventListener("click", headerToggle);\n\n  /**\n   * navbar.php\n   * Toggle mobile nav dropdowns\n   */\n  document.querySelectorAll(".navmenu .toggle-dropdown").forEach(function (navmenu) {\n    navmenu.addEventListener("click", function (e) {\n      e.preventDefault();\n      this.parentNode.classList.toggle("active");\n      this.parentNode.nextElementSibling.classList.toggle("dropdown-active");\n      e.stopImmediatePropagation();\n    });\n  });\n\n  /**\n   * Preloader\n   * if page has selector .page-preloaderthen the preloader will appear for 1000ms\n   * if not , then no loader will be shown\n   */\n  var preloader = document.querySelector("#preloader");\n  if (preloader) {\n    setTimeout(function () {\n      preloader.remove();\n    }, 500);\n  }\n\n  /**\n   * Scroll top button\n   */\n  var scrollTop = document.querySelector(".scroll-top");\n  function toggleScrollTop() {\n    if (scrollTop) {\n      window.scrollY > 100 ? scrollTop.classList.add("active") : scrollTop.classList.remove("active");\n    }\n  }\n  scrollTop.addEventListener("click", function (e) {\n    e.preventDefault();\n    window.scrollTo({\n      top: 0,\n      behavior: "smooth"\n    });\n  });\n  window.addEventListener("load", toggleScrollTop);\n  document.addEventListener("scroll", toggleScrollTop);\n\n  /**\n   * Init swiper sliders\n   */\n  function initSwiper() {\n    document.querySelectorAll(".init-swiper").forEach(function (swiperElement) {\n      var config = JSON.parse(swiperElement.querySelector(".swiper-config").innerHTML.trim());\n      new Swiper(swiperElement, config);\n    });\n  }\n  window.addEventListener("load", initSwiper);\n\n  /**\n   * Animation on scroll function and init\n   */\n  function aosInit() {\n    AOS.init({\n      once: true,\n      startEvent: "DOMContentLoaded",\n      useClassNames: true,\n      disableMutationObserver: false,\n      offset: 50,\n      delay: 0,\n      easing: "ease",\n      mirror: false,\n      disable: function disable() {\n        return window.innerWidth < 768;\n      }\n    });\n  }\n\n  // Initialiser AOS immédiatement et aussi lors du chargement de la page\n  aosInit();\n  window.addEventListener("load", aosInit);\n  var logo = document.querySelector(".header");\n  window.addEventListener("scroll", function () {\n    if (window.scrollY > 150) {\n      logo.classList.add("hide");\n    } else {\n      logo.classList.remove("hide");\n    }\n  }, {\n    passive: true\n  });\n  var dropdownItems = document.querySelectorAll(".dropdown-item");\n  dropdownItems.forEach(function (item) {\n    item.addEventListener("click", function () {\n      dropdownItems.forEach(function (item) {\n        item.classList.remove("active-link");\n      });\n      item.classList.add("active-link");\n    });\n  });\n  console.log("test");\n  //end of the page\n});\n\n//# sourceURL=webpack://theme_base/./assets/js/main.js?')}},__webpack_exports__={};__webpack_modules__["./assets/js/main.js"]()})();