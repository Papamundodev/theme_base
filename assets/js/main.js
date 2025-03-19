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
});
