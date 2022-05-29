fetch("./newdata_api.php").then(onResponse).then(onJson);
function onResponse(response){
    return response.json();
}
const box= document.querySelector('#news');
function onJson(json){
    const results = json.results;
    for(let result of results){
        const div = document.createElement('div');
        const form = document.createElement('form');
        div.classList.add('testo');
        const title = document.createElement('h2');
        title.textContent = result.title;
        form.appendChild(title);
        
        if(result.image_url){
        let img = document.createElement('img');
        img.src= result.image_url;
        img.classList.add('images');
        form.appendChild(img);
        }
        
        let text = document.createElement('article');
        text.textContent = result.description;
        form.appendChild(text);

        let link = document.createElement('a');
        link.href = result.link;
        link.textContent = "Clicca qui per l'articolo completo";
        form.appendChild(link);
        stringa_fetch = "./isFavorite.php?title=" +title.textContent;
        const like = document.createElement('input');
        like.type = 'submit';
        like.classList.add('like-button');
        fetch(stringa_fetch).then(ResponseButton).then(function(text){return HandButton(text,like,form)});
        form.appendChild(like);
        div.appendChild(form);
        box.appendChild(div);
    }
}



function HandButton(text,like,form){
        if(text === '1'){
            like.value = 'Aggiunto ai preferiti ✔';
            form.addEventListener('submit', CancelSubmit);
        }
        else {
            form.addEventListener('submit', AddToFavorites);
            like.classList.add('like-button-unselected');
            like.value = 'Aggiungi ai preferiti'
        }
}

function ResponseButton(response){
    return response.text();
}
function CancelSubmit(event){
    event.preventDefault();
}
function AddToFavorites(event){
    event.currentTarget.removeEventListener('submit',AddToFavorites);
    event.preventDefault();
    event.currentTarget.addEventListener('submit', CancelSubmit);
    // Leggi form
    const form = event.currentTarget;
    // Invia richiesta con POST
    const form_data = new FormData();
    form_data.append("title",form.querySelector("h2").textContent);
    if(form.querySelector("img"))
        form_data.append("img",form.querySelector("img").src);
    form_data.append("article",form.querySelector("article").textContent);
    form_data.append("link",form.querySelector("a").href);
    fetch("./AddToFavorites.php", {method: 'post', body: form_data, mode: 'no-cors'});
    event.preventDefault();
    event.currentTarget.querySelector('input').value = 'Aggiunto ai preferiti ✔'
    event.currentTarget.querySelector('input').classList.remove('like-button-unselected');
}
const show_menu= document.querySelector('#show_menu');
const menu = document.querySelector('#menu');
menu.addEventListener('click',showMenu);
show_menu.querySelector('div').addEventListener('click',closeMenu);

function showMenu(event){
    event.currentTarget.classList.add('hidden');
    show_menu.classList.remove('hidden');
    show_menu.classList.add('show_menu');
}

function closeMenu(event){
    show_menu.classList.remove('show_menu');
    show_menu.classList.add('hidden');
    menu.classList.remove('hidden');
    
}