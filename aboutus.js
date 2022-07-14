fetch("clients.json")
.then(function(response){
    return response.json(); 
})

.then(function(clients){ 
    let placeholder = document.querySelector("#data-output");
    let out = ""; 
    for(let client of clients){
        out += ` 
            <tr>
                <td>${client.club}</td>
                <td>${client.trainer}</td>
                <td>${client.trophy}</td>
                <td>${client.comments}</td>
            </tr>
            `;
    }

    placeholder.innerHTML = out; 
})

window.onresize = function(event)
{
document.location.reload(true);
}

window.onload = function()
{
    const mediaQuery = window.matchMedia('(max-width: 600px)')
    var menu = document.getElementById("left-side");
    var hamburger = document.getElementById("hamburger");
    var menu_buttons = document.getElementsByClassName('menu_button')

    console.log(1)
    hamburger.onclick = function(){            
        if (menu.style.display == ("none"))         
            menu.style.display = "block";          
        else
            menu.style.display = "none";        
    }

    for(let i=0; i < menu_buttons.length; i++)
    menu_buttons[i].onclick = function(){
        if (screen.width < 701)
        menu.style.display = "none"
    }   
};