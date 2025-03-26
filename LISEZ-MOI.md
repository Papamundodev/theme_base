# Intégration des publications Instagram

Ce thème WordPress intègre une fonctionnalité permettant d'afficher facilement des publications Instagram sur votre site.

## Mise à jour importante : Solution compatible avec les changements d'API Instagram

Suite à l'annonce de la dépréciation de l'API Instagram Basic Display (au 4 décembre 2024), nous avons mis à jour notre solution d'intégration Instagram pour utiliser uniquement l'API oEmbed, qui **continuera à fonctionner** même après cette date.

### Compatibilité garantie

L'API oEmbed d'Instagram, utilisée dans ce code, ne fait **pas** partie de l'API Basic Display qui sera dépréciée. La fonctionnalité d'intégration de publications Instagram individuelles et de galeries continuera à fonctionner normalement après le 4 décembre 2024.

## Configuration actuelle

Les identifiants de l'API Facebook (qui gère Instagram) configurés dans ce code :

- ID d'application : 2364138767282644
- Clé d'application : 554629e2678cf9d36917ae856c21d533

## Utilisation des shortcodes

### Afficher une publication spécifique

Pour afficher une publication Instagram spécifique sur votre site, utilisez le shortcode suivant :

```
[instagram url="https://www.instagram.com/p/ID_DE_LA_PUBLICATION/"]
```

Vous pouvez également spécifier une largeur maximale :

```
[instagram url="https://www.instagram.com/p/ID_DE_LA_PUBLICATION/" width="400"]
```

### Afficher une galerie de publications Instagram

Pour afficher plusieurs publications Instagram dans une galerie, utilisez le shortcode suivant :

```
[instagram_gallery posts="ID1,ID2,ID3" width="400"]
```

Options disponibles :

- `posts` : Liste des IDs de publications Instagram séparés par des virgules (obligatoire)
- `width` : La largeur maximale des publications en pixels (optionnel)

#### Comment trouver l'ID d'une publication Instagram ?

L'ID d'une publication Instagram est la partie de l'URL qui suit `/p/`. Par exemple, pour la publication à l'adresse `https://www.instagram.com/p/CgwHCO2JQlt/`, l'ID est `CgwHCO2JQlt`.

## Limites et avantages

- ✅ Cette méthode continuera à fonctionner après la dépréciation de l'API Basic Display.
- ✅ Fonctionne avec tous les types de comptes Instagram (personnels et professionnels).
- ✅ Pas besoin d'authentification complexe OAuth.
- ❌ Nécessite de spécifier manuellement les IDs des publications (pas de récupération automatique des derniers posts).

## Personnalisation de l'affichage

Les styles CSS de l'intégration Instagram se trouvent dans le fichier `assets/css/main.css`. Vous pouvez les modifier selon vos besoins.

## Dépannage

Si les publications ne s'affichent pas correctement :

1. Vérifiez que l'URL ou l'ID de la publication Instagram est correct
2. Assurez-vous que la publication est publique et non privée
3. Vérifiez la validité des identifiants de l'API Facebook
4. Consultez les erreurs dans la console JavaScript du navigateur

## Fonctions PHP directes

Pour les développeurs qui souhaitent utiliser les fonctions directement dans leur code PHP :

```php
<?php
// Afficher une publication spécifique
$instagram_html = get_instagram_embed('https://www.instagram.com/p/ID_DE_LA_PUBLICATION/', 500);
echo $instagram_html;

// Créer une galerie de publications
$post_ids = array('CgwHCO2JQlt', 'CfMrqN6Dh93', 'CdBaYqNDb88');
$gallery_html = get_instagram_gallery($post_ids, 400);
echo $gallery_html;
?>
```
