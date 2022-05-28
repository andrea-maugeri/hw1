fetch("https://api.spreaker.com/v2/search?type=episodes&q=crypto&limit=5").then(onResponse).then(onJson);
function onResponse(response){
    return response.json();
}
const box= document.querySelector('section');
function onJson(json){
    const results = json.response.items;
    box.innerHTML='';
    for(let result of results){
        const div = document.createElement('div');
        div.classList.add('contenitore');

        const title = document.createElement('h2');
        title.textContent = result.title;
        div.appendChild(title);
        
        let img = document.createElement('img');
        img.src= result.image_url;
        img.classList.add('images');
        div.appendChild(img);
        
        let play = document.createElement('a');
        play.textContent = 'Play episode';
        play.href = result.site_url;
        div.appendChild(play);
         
        if(result.download_enabled){
            let download = document.createElement('a');
            download.textContent = 'Download';
            download.href = result.download_url;
            div.appendChild(download);
        }
        box.appendChild(div);
    }
}

document.querySelector('input').addEventListener('keydown',ricerca);
function ricerca(event){
    console.log(event.code);
    if(event.code == 'Enter'){
        console.log('ricerca');
        const stringa_fetch ="https://api.spreaker.com/v2/search?type=episodes&q=" + encodeURIComponent(event.currentTarget.value +" crypto") +"&limit=5";
        console.log(stringa_fetch);
        fetch(stringa_fetch).then(onResponse).then(onJson);
        event.preventDefault();
    }
}