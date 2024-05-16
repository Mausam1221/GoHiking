function get_users()
{
     let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/users.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('users-data').innerHTML = this.responseText;
            }

            xhr.send('get_users');
        
}

function toggle_status (id, val)
{
    
}
function remove_room(room_id)
{
    
}
window. onload = function()
{
get_users();
}
I