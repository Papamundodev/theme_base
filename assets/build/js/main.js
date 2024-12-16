(()=>{var __webpack_modules__={"./assets/js/main.js":()=>{eval("document.addEventListener('DOMContentLoaded', () => {\n    let openSearchModal = document.getElementById('open-search-modal');\n    let modal = document.getElementById('search-modal');\n    let closeSearchModal = document.getElementById('close-search-modal');\n\n\n\n    openSearchModal.addEventListener('click', function() {\n        modal.showModal();\n        console.log('modal ouverte');\n        document.querySelector('main').style.visibility = 'hidden';\n        document.querySelector('.header__search').style.visibility = 'hidden';\n    });\n\n    document.addEventListener('keydown', function(e) {\n        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {\n            e.preventDefault();\n            modal.showModal();\n            document.querySelector('main').style.visibility = 'hidden';\n            document.querySelector('.header__search').style.visibility = 'hidden';\n        }\n    });\n\n\n    document.addEventListener('keydown', function(e) {\n        if (e.key === 'Escape') {\n            let searchInput = document.getElementById('search-autocomplete');\n            searchInput.value = '';\n            let searchResults = document.getElementById('search-results');\n            searchResults.innerHTML = '';\n            e.preventDefault();\n            modal.classList.add('closing');\n            setTimeout(() => {\n                modal.classList.remove('closing');\n                modal.close();\n                document.querySelector('main').style.visibility = 'visible';\n                document.querySelector('.header__search').style.visibility = 'visible';\n            }, 300);\n        }\n    });\n\n    if (closeSearchModal) { \n        closeSearchModal.addEventListener('click', function(e) {\n            e.preventDefault();\n            let searchInput = document.getElementById('search-autocomplete');\n            searchInput.value = '';\n            let searchResults = document.getElementById('search-results');\n            searchResults.innerHTML = '';\n            modal.classList.add('closing');\n            document.querySelector('main').style.visibility = 'visible';\n            document.querySelector('.header__search').style.visibility = 'visible';\n            setTimeout(() => {\n                modal.classList.remove('closing');\n                modal.close();\n            }, 300);\n        });\n    }\n\n    search_posts('search-autocomplete', 'search-results');\n\n\n\n});\n\nfunction ajax_call_create_post(action, post, selector) {\n    fetch(ajaxurl.ajax_url, {\n        method: 'POST',\n        headers: {\n            'Content-Type': 'application/x-www-form-urlencoded',\n        },\n        body: new URLSearchParams({\n            action: action,\n            card_id: post.id,\n            card_name: post.name,\n            card_desc: post.desc,\n            card_arcane: post.arcane,\n        })\n    })\n    .then(response => response.json())\n    .then(data => {\n        console.log(\"Success\", data.success)\n        if (selector) {\n            console.log(selector)\n            console.log(data.data)\n        }\n    })\n    .catch(error => {\n        console.log(error);\n    });\n}\n\nfunction tarot_api_call() {\n    fetch(\"https://tarotapi.dev/api/v1/cards\")\n    .then(function (response) {\n        return response.json();\n    })\n    .then(function (data) {\n        console.log(data)\n        data.cards.forEach(card => {\n            let card_id = card.name_short\n            let card_name = card.name\n            let card_desc = card.desc\n            let card_arcane = card.type\n            ajax_call_create_post('create_post', {id: card_id, name: card_name, desc: card_desc, arcane: card_arcane}, document.getElementById('ajax-response'));\n        });\n    })\n    .catch(function (error) {\n        console.log(error);\n    });\n}\n\nfunction search_posts(search_input, selector) {\n    document.getElementById(search_input).addEventListener('input', function() {\n        let searchTerm = this.value;\n        if (searchTerm.length > 0) {\n        fetch(ajaxurl.ajax_url, {\n            method: 'POST',\n            headers: {\n                'Content-Type': 'application/x-www-form-urlencoded',\n            },\n            body: new URLSearchParams({\n                action: 'search_autocomplete',\n                search_term: searchTerm,\n                security: ajaxurl.nonce\n            })\n        })\n        .then(response => response.json())\n        .then(response => {\n            if (response.success) {\n                let results = response.data;\n                let searchResults = document.getElementById(selector);\n                console.log(searchResults)\n                searchResults.innerHTML = '';\n                if (results.length > 0) {\n                    searchResults.innerHTML = results;\n                } else {\n                    searchResults.innerHTML = '<div class=\"\">Aucun résultat trouvé.</div>';\n                }\n                } else {\n                    console.error(response.data);\n                }\n            })\n            .catch(error => {\n                console.error(error);\n            });\n        } else {\n            document.getElementById(selector).innerHTML = '';\n        }\n    });\n}\n\n\n\n//# sourceURL=webpack://moon/./assets/js/main.js?")}},__webpack_exports__={};__webpack_modules__["./assets/js/main.js"]()})();