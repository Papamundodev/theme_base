document.addEventListener('DOMContentLoaded', () => {
    //tarot_api_call();
});

function ajax_call_create_post(action, post, selector) {
    fetch(ajaxurl, {
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