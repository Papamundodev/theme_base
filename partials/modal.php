
    <dialog id="favDialog">
  
        <?php get_template_part('partials/header/navbar-mobile', null, ['theme_location' => 'header']); ?>

    <button id="confirmBtn">Confirm</button>

    </dialog>

    <button id="showDialog">Show dialog</button>

    <script>
const showButton = document.getElementById("showDialog");
  const favDialog = document.getElementById("favDialog");
  const confirmBtn = favDialog.querySelector("#confirmBtn");

  //the conditions has to go.
  if (showButton && favDialog && confirmBtn) {
    
  showButton.addEventListener("click", () => {
    favDialog.showModal();
  });
  confirmBtn.addEventListener("click", () => {
    favDialog.close();
  });
  }


    </script>