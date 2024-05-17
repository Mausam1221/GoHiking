// function get_users()
// {
//      let xhr = new XMLHttpRequest();
//             xhr.open("POST", "ajax/users.php", true);
//             xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//             xhr.onload = function() {
//                 document.getElementById('users-data').innerHTML = this.responseText;
//             }

//             xhr.send('get_users');
        
// }


// function remove_user(user_id) 
// {
//     if(confirm("Are you sure want to remove this user?")) 
//     {
//         let data = new FormData();
//         data.append('user_id', user_id);
//         data.append('remove_user', '');

//         //AJAX CALL TO HANDLE FORM SUBMISSION
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "ajax/users.php", true);

//         xhr.onload = function() {
//             // console.log(this.responseText);

//             if (this.responseText == 1) {
//                 alert('success', " User removed successfully!");
//                 get_users();


//             } else {
//                 alert('error', "Cannot Delete!");
                
//             }
//         }
//         xhr.send(data);
//     }
// }
// window.onload = function()
// {
// get_users();
// }
