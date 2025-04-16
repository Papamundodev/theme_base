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
  const themeToggle = document.getElementById("tld-theme-toggle");
  themeToggle.addEventListener("click", () => {
    updateContrastRatio();
  });

  // Initial contrast calculation // keep only in development
  updateContrastRatio();
  //end of the page
});

function updateContrastRatio() {
  const cards = document.querySelectorAll(".element-ratio-calculating");
  cards.forEach((card) => {
    const textColors = card.querySelectorAll(".text-color");
    const bg = getComputedColor(card, "background-color");
    const bgComputed = card.querySelector(".bg-color-computed");
    bgComputed.textContent = bg;
    textColors.forEach((text) => {
      const color = getComputedColor(text, "color");
      const ratio = getContrastRatio(bg, color);
      const ratioFormatted = ratio.toFixed(2);
      const ratioComputed = text.querySelector(".ratio");
      ratioComputed.textContent = `${ratioFormatted}:1`;
    });
  });
}

// Fonction pour calculer le ratio de contraste
function getContrastRatio(color1, color2) {
  let rgb1 = {
    r: parseInt(color1.slice(1, 3), 16),
    g: parseInt(color1.slice(3, 5), 16),
    b: parseInt(color1.slice(5, 7), 16),
  };

  let rgb2 = {
    r: parseInt(color2.slice(1, 3), 16),
    g: parseInt(color2.slice(3, 5), 16),
    b: parseInt(color2.slice(5, 7), 16),
  };

  let l1 = getLuminance(rgb1.r, rgb1.g, rgb1.b);
  let l2 = getLuminance(rgb2.r, rgb2.g, rgb2.b);

  let lighter = Math.max(l1, l2);
  let darker = Math.min(l1, l2);

  return (lighter + 0.05) / (darker + 0.05);
}

// Fonction pour obtenir la couleur calculée
function getComputedColor(element, property) {
  const style = window.getComputedStyle(element);
  const color = style.getPropertyValue(property);

  if (color.startsWith("color(srgb")) {
    const [r, g, b] = color
      .match(/[\d.]+/g)
      .map(Number)
      .map((x) => Math.round(x * 255));

    return (
      "#" +
      [r, g, b]
        .map((x) => {
          const hex = x.toString(16);
          return hex.length === 1 ? "0" + hex : hex;
        })
        .join("")
    );
  }

  if (color.startsWith("rgb")) {
    const [r, g, b] = color
      .match(/[\d.]+/g)
      .map(Number)
      .map(Math.round);

    return (
      "#" +
      [r, g, b]
        .map((x) => {
          const hex = x.toString(16);
          return hex.length === 1 ? "0" + hex : hex;
        })
        .join("")
    );
  }

  return color;
}

function getLuminance(r, g, b) {
  let [rs, gs, bs] = [r, g, b].map((c) => {
    c = c / 255;
    return c <= 0.03928 ? c / 12.92 : Math.pow((c + 0.055) / 1.055, 2.4);
  });

  return 0.2126 * rs + 0.7152 * gs + 0.0722 * bs;
}
