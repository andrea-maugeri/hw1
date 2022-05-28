AddEventListener();
function AddEventListener(){
    if(document.querySelector('input')){ //se la pagina non è vuota
        const buttons = document.querySelectorAll('input');
        for( let button of buttons){
        button.addEventListener('click',eliminaArticolo);
        } 
    }
}

function eliminaArticolo(event){
    stringa_fetch = "deleteFavorites.php?title=" +event.currentTarget.parentNode.querySelector('h2').textContent;
    fetch(stringa_fetch).then(responseAggiorna).then(onJSON);
}
function responseAggiorna(response)
{
    return response.json();
}
function onJSON(json){
    const box= document.querySelector('section');
    box.innerHTML = '';
    if(json){
        console.log(json);
        for (let result of json){
            const div = document.createElement('div');
            div.classList.add('testo');
            const title = document.createElement('h2');
            title.textContent = result.title;
            div.appendChild(title);
            
            if(result.img_url){
            let img = document.createElement('img');
            img.src= result.img_url;
            img.classList.add('images');
            div.appendChild(img);
            }
            
            let text = document.createElement('article');
            text.textContent = result.content;
            div.appendChild(text);

            let link = document.createElement('a');
            link.href = result.link;
            link.textContent = "Clicca qui per l'articolo completo";
            div.appendChild(link);

            let like = document.createElement('input');
            like.type = 'submit';
            like.value = 'Rimuovi dai preferiti ✖';
            like.classList.add('like-button');
            like.classList.add('like-button-unselected');
            div.appendChild(like);
            box.appendChild(div);
            }
        AddEventListener();
    }
    else{
        const div = document.createElement('div');
        div.classList.add('testo');
        const title = document.createElement('h2');
        title.textContent = "La tua lista preferiti è vuota";
        div.appendChild(title);
        box.appendChild(div);
    }

}
