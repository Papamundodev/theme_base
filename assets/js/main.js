document.addEventListener("DOMContentLoaded", () => {
  console.log("DOMContentLoaded");

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

  const popoverSearchResults = document.getElementById(
    "search-results-popover"
  );

  document.addEventListener("keydown", function (e) {
    if ((e.metaKey || e.ctrlKey) && e.key === "k") {
      e.preventDefault();
      popoverSearchResults.showPopover();
    }
  });

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
  //end of the page
});
