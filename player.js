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

    var task_popup = document.getElementById("player_task_popup")
    var no_task = document.getElementById("player_task_no")
    var task_button = document.getElementById('player_task_button')

    no_task.onclick = function(){
        task_popup.style.display = "none";
    };

    task_button.onclick = function(){
        task_popup.style.display = "block";
    };
};