import "clipboard-copy-element";

document.addEventListener("DOMContentLoaded", () => {
  console.log("DOMContentLoaded");
  console.log("wpApiSettings:", wpApiSettings);
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
});
