document.addEventListener('DOMContentLoaded', () => {
    let openSearchModal = document.getElementById('open-search-modal');
    let modal = document.getElementById('search-modal');
    let closeSearchModal = document.getElementById('close-search-modal');



    openSearchModal.addEventListener('click', function() {
        modal.showModal();
        console.log('modal ouverte');
        document.querySelector('main').style.visibility = 'hidden';
        document.querySelector('.header__search').style.visibility = 'hidden';
    });

    document.addEventListener('keydown', function(e) {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            e.preventDefault();
            modal.showModal();
            document.querySelector('main').style.visibility = 'hidden';
            document.querySelector('.header__search').style.visibility = 'hidden';
        }
    });


    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            let searchInput = document.getElementById('search-autocomplete');
            searchInput.value = '';
            let searchResults = document.getElementById('search-results');
            searchResults.innerHTML = '';
            e.preventDefault();
            modal.classList.add('closing');
            setTimeout(() => {
                modal.classList.remove('closing');
                modal.close();
                document.querySelector('main').style.visibility = 'visible';
                document.querySelector('.header__search').style.visibility = 'visible';
            }, 300);
        }
    });

    if (closeSearchModal) { 
        closeSearchModal.addEventListener('click', function(e) {
            e.preventDefault();
            let searchInput = document.getElementById('search-autocomplete');
            searchInput.value = '';
            let searchResults = document.getElementById('search-results');
            searchResults.innerHTML = '';
            modal.classList.add('closing');
            document.querySelector('main').style.visibility = 'visible';
            document.querySelector('.header__search').style.visibility = 'visible';
            setTimeout(() => {
                modal.classList.remove('closing');
                modal.close();
            }, 300);
        });
    }

    search_posts('search-autocomplete', 'search-results');



});

function ajax_call_create_post(action, post, selector) {
    fetch(ajaxurl.ajax_url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            action: action,
            card_id: post.id,
            card_name: post.name,
            card_desc: post.desc,
            card_arcane: post.arcane,
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log("Success", data.success)
        if (selector) {
            console.log(selector)
            console.log(data.data)
        }
    })
    .catch(error => {
        console.log(error);
    });
}

function tarot_api_call() {
    fetch("https://tarotapi.dev/api/v1/cards")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.log(data)
        data.cards.forEach(card => {
            let card_id = card.name_short
            let card_name = card.name
            let card_desc = card.desc
            let card_arcane = card.type
            ajax_call_create_post('create_post', {id: card_id, name: card_name, desc: card_desc, arcane: card_arcane}, document.getElementById('ajax-response'));
        });
    })
    .catch(function (error) {
        console.log(error);
    });
}

function search_posts(search_input, selector) {
    document.getElementById(search_input).addEventListener('input', function() {
        let searchTerm = this.value;
        if (searchTerm.length > 0) {
        fetch(ajaxurl.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'search_autocomplete',
                search_term: searchTerm,
                security: ajaxurl.nonce
            })
        })
        .then(response => response.json())
        .then(response => {
            if (response.success) {
                let results = response.data;
                let searchResults = document.getElementById(selector);
                console.log(searchResults)
                searchResults.innerHTML = '';
                if (results.length > 0) {
                    searchResults.innerHTML = results;
                } else {
                    searchResults.innerHTML = '<div class="">Aucun résultat trouvé.</div>';
                }
                } else {
                    console.error(response.data);
                }
            })
            .catch(error => {
                console.error(error);
            });
        } else {
            document.getElementById(selector).innerHTML = '';
        }
    });
}

