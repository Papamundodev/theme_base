import "clipboard-copy-element";

document.addEventListener("DOMContentLoaded", () => {
  console.log("DOMContentLoaded");

  //responsive navbar

  const burger = document.querySelector("#theme-navbar-toggler");
  burger.addEventListener("click", () => {
    burger.classList.toggle("open");
  });

  const popover = document.getElementById("navmenu-header-mobile");
  popover.addEventListener("toggle", (event) => {
    if (event.newState === "closed") {
      burger.classList.remove("open");
    } else if (event.newState === "open") {
    }
  });

  //end of responsive navbar

  //search popover

  const popoverSearchResults = document.getElementById(
    "search-results-popover"
  );

  if (popoverSearchResults) {
    document.addEventListener("keydown", function (e) {
      if ((e.metaKey || e.ctrlKey) && e.key === "k") {
        e.preventDefault();
        popoverSearchResults.showPopover();
      }
    });
  }

  //end of search popover

  //dropdown menu
  const viewportWidth = window.innerWidth;
  const header = document.querySelector("#navmenu-header");
  const dropdownsMobile = document.querySelectorAll(
    "#navmenu-header .dropdown"
  );
  if (viewportWidth < 768) {
    dropdownsMobile.forEach((dropdown) => {
      dropdown.addEventListener("click", () => {
        dropdown.classList.toggle("open");
      });
    });
  }
  //end of dropdown menu

  //copy to clipboard
  const codeBlocks = document.querySelectorAll(".code-block");
  codeBlocks.forEach((codeBlock) => {
    const clipboardCopy = document.createElement("clipboard-copy");
    clipboardCopy.value = codeBlock.textContent;
    codeBlock.appendChild(clipboardCopy);

    codeBlock.addEventListener("click", () => {
      clipboardCopy.click();
      codeBlock.classList.add("copied");
      setTimeout(() => {
        codeBlock.classList.remove("copied");
      }, 2000);
    });
  });

  const modules = document.querySelectorAll(".wrapper-module");
  if (modules) {
    const vportWidth = window.innerWidth;
    modules.forEach((module) => {
      if (module) {
        if (vportWidth < 992) {
          module.setAttribute("popover", "auto");
        } else {
          module.removeAttribute("popover");
        }
      }
    });
    //add event to window when resize
    window.addEventListener("resize", () => {
      const vportWidthEvent = window.innerWidth;
      modules.forEach((module) => {
        if (module) {
          if (vportWidthEvent < 992) {
            module.setAttribute("popover", "auto");
          } else {
            module.removeAttribute("popover");
          }
        }
      });
    });
  }

  // Trouver tous les boutons de like
  const likeButtons = document.querySelectorAll(".like-button");

  likeButtons.forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();

      const postId = this.dataset.postId;
      const currentLikes = parseInt(this.dataset.likes) || 0;

      // Désactiver le bouton pendant la requête
      this.disabled = true;

      // Mettre à jour le meta likes
      fetch("/wp-json/wp/v2/posts/" + postId, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-WP-Nonce": wpApiSettings.nonce,
        },
        body: JSON.stringify({
          meta: {
            likes: currentLikes + 1,
          },
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          // Mettre à jour l'affichage
          this.dataset.likes = currentLikes + 1;
          this.querySelector(".like-count").textContent = currentLikes + 1;

          // Ajouter une classe pour le style "liked"
          this.classList.add("liked");
        })
        .catch((error) => {
          console.error("Erreur:", error);
          // Réactiver le bouton en cas d'erreur
          this.disabled = false;
        });
    });
  });

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
  //import instagram feed
});

// Fonction pour charger les intégrations Instagram
function loadInstagramEmbeds() {
  // Si le SDK Facebook n'est pas chargé, l'ajouter au DOM
  if (!document.getElementById("facebook-jssdk")) {
    const script = document.createElement("script");
    script.id = "facebook-jssdk";
    script.src =
      "https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v22.0";
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);
  }

  // Si la fonction FB existe, forcer le rendu des intégrations
  if (typeof FB !== "undefined") {
    FB.XFBML.parse();
  }
}

// Appeler la fonction quand le DOM est chargé
document.addEventListener("DOMContentLoaded", loadInstagramEmbeds);

function setupScrollAnimations() {
  // Sélectionnez les éléments à animer (à adapter selon vos besoins)
  const elementsToAnimate = document.querySelectorAll(".card");
  console.log(elementsToAnimate);

  // Options de l'Intersection Observer
  const observerOptions = {
    root: null, // utilise le viewport comme zone d'observation
    rootMargin: "0px", // aucune marge
    threshold: 0.1, // déclenche lorsque 10% de l'élément est visible
  };

  // Fonction de callback exécutée lors de l'intersection
  const observerCallback = (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Ajoute une classe pour déclencher l'animation CSS
        entry.target.classList.add("animate");

        // Optionnel : stoppe l'observation une fois animé
        observer.unobserve(entry.target);
      } else if (entry.isIntersecting === false) {
        // Optionnel : retire la classe si l'élément n'est plus visible
        entry.target.classList.remove("animate");
      }
    });
  };

  // Crée l'observer
  const observer = new IntersectionObserver(observerCallback, observerOptions);

  // Observe chaque élément
  elementsToAnimate.forEach((element) => {
    observer.observe(element);
  });
}

document.addEventListener("DOMContentLoaded", setupScrollAnimations);
