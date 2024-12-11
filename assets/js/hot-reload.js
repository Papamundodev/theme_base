let lastCompilationHash = '';

function checkForUpdates() {
    fetch('/wp-content/themes/theme_base_wordpress/assets/build/compilation-status.json?' + new Date().getTime())
        .then(response => response.json())
        .then(data => {
            if (lastCompilationHash && lastCompilationHash !== data.hash) {
                console.log('Nouvelle compilation détectée, rechargement...');
                window.location.reload();
            }
            lastCompilationHash = data.hash;
        })
        .catch(error => console.log('Vérification du statut de compilation...'));
}

// Vérifie toutes les 1000ms
setInterval(checkForUpdates, 1000);