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
    
    var delete_player_popup = document.getElementById("delete_player_popup")
    var no_delete_player_id = document.getElementById("delete_player_no")
    var delete_button = document.getElementById('stats_delete_player')

    no_delete_player_id.onclick = function(){
        delete_player_popup.style.display = "none";
    };

    delete_button.onclick = function(){
        delete_player_popup.style.display = "block";
    };

    var edit_player_popup = document.getElementById("edit_player_popup")
    var no_edit_player_id = document.getElementById("edit_player_no")
    var edit_button = document.getElementById('stats_edit_player')

    no_edit_player_id.onclick = function(){
        edit_player_popup.style.display = "none";
    };

    edit_button.onclick = function(){
        edit_player_popup.style.display = "block";
    };

    var task_player_popup = document.getElementById("task_player_popup")
    var no_task_player_id = document.getElementById("task_player_no")
    var task_button = document.getElementById('stats_task_player')

    no_task_player_id.onclick = function(){
        task_player_popup.style.display = "none";
    };

    task_button.onclick = function(){
        task_player_popup.style.display = "block";
    };


};