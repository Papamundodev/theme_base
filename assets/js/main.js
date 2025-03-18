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

  const leftAside = document.querySelector(".left");
  const rightAside = document.querySelector(".right");
  const vportWidth = window.innerWidth;
  if (leftAside) {
    if (vportWidth < 992) {
      leftAside.setAttribute("popover", "auto");
    } else {
      leftAside.removeAttribute("popover");
    }
  }
  if (rightAside) {
    if (vportWidth < 992) {
      rightAside.setAttribute("popover", "auto");
    } else {
      rightAside.removeAttribute("popover");
    }
  }

  //add event to window when resize
  window.addEventListener("resize", () => {
    const vportWidthEvent = window.innerWidth;
    if (vportWidthEvent < 992) {
      leftAside.setAttribute("popover", "auto");
      rightAside.setAttribute("popover", "auto");
    } else {
      leftAside.removeAttribute("popover");
      rightAside.removeAttribute("popover");
    }
  });
});
