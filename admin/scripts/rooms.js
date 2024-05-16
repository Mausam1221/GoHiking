let add_room_form = document.getElementById("add_room_form");
add_room_form.addEventListener("submit", (e) => {
  e.preventDefault();
  add_room();
});

function add_room() {
  let data = new FormData();
  data.append("add_room", "");
  data.append("name", add_room_form.elements["name"].value); //on name basis
  data.append("area", add_room_form.elements["area"].value);
  data.append("price", add_room_form.elements["price"].value);
  data.append("quantity", add_room_form.elements["quantity"].value);
  data.append("adult", add_room_form.elements["adult"].value);
  data.append("children", add_room_form.elements["children"].value);
  data.append("desc", add_room_form.elements["desc"].value);

  let features = [];

  add_room_form.elements["features"].forEach((el) => {
    if (el.checked) {
      // console.log(el.value);
      features.push(el.value);
    }
  });
  let facilities = [];

  add_room_form.elements["facilities"].forEach((el) => {
    if (el.checked) {
      // console.log(el.value);
      facilities.push(el.value);
    }
  });

  data.append("features", JSON.stringify(features));
  data.append("facilities", JSON.stringify(facilities));

  //AJAX CALL TO HANDLE FORM SUBMISSION
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);

  xhr.onload = function () {
    console.log(this.responseText);

    var myModel = document.getElementById("add-room");
    var model = bootstrap.Modal.getInstance(myModel);
    model.hide();

    if (this.responseText == 1) {
      window.location.reload();
      alert("success", "New Room Added!");
      add_room_form.reset();
      
      // get_features();
    //   get_all_rooms();
      // window.location.reload();
    } else {
      alert("error", "Server Down!");
    }
  };
  xhr.send(data); //data will be send from here---->rooms.php
}

function get_all_rooms() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("room-data").innerHTML = this.responseText;
    // get_all_rooms();
  };
  xhr.send("get-all-rooms");
}

// let edit_room_form = document.getElementById('edit_room_form');

// function edit_details(id) {
//   console.log(id);
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "ajax/rooms.php", true);
//     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//     xhr.onload = function() {
//         let data = JSON.parse(this.responseText); //everything that comes from ajax is in text form
//         edit_room_form.elements['name'].value = data.roomdata
//             .name; //setting data in modal data ko roomdata=>name
//         edit_room_form.elements['area'].value = data.roomdata.area;
//         edit_room_form.elements['price'].value = data.roomdata.price;
//         edit_room_form.elements['quantity'].value = data.roomdata.quantity;
//         edit_room_form.elements['name'].value = data.roomdata.name;
//         edit_room_form.elements['name'].value = data.roomdata.name;
//         edit_room_form.elements['adult'].value = data.roomdata.adult;
//         edit_room_form.elements['children'].value = data.roomdata.children;
//         edit_room_form.elements['desc'].value = data.roomdata.description;
//         edit_room_form.elements['room_id'].value = data.roomdata.room_id;

//         edit_room_form.elements['facilities'].forEach(el => {
//             if (data.facilities.includes(Number(el.value))) { //conver to number because data that comes from ajax is always in text form.
//                 el.checked = true;
//             }
//         });
//         edit_room_form.elements['features'].forEach(el => {
//             if (data.features.includes(Number(el.value))) {
//                 el.checked = true;
//             }
//         });

//     }
//     xhr.send('get_room=' + id);
// }

// edit_room_form.addEventListener('submit', (e) => {
//     e.preventDefault();
//     submit_edit_room();
// })

// function submit_edit_room() {

//     let data = new FormData();
//     data.append('edit_room', '');
//     data.append('room_id', edit_room_form.elements['room_id'].value);
//     data.append('name', edit_room_form.elements['name'].value); //on name basis
//     data.append('area', edit_room_form.elements['area'].value);
//     data.append('price', edit_room_form.elements['price'].value);
//     data.append('quantity', edit_room_form.elements['quantity'].value);
//     data.append('adult', edit_room_form.elements['adult'].value);
//     data.append('children', edit_room_form.elements['children'].value);
//     data.append('desc', edit_room_form.elements['desc'].value);

//     let features = [];

//     edit_room_form.elements['features'].forEach(el => {
//         if (el.checked) {
//             // console.log(el.value);
//             features.push(el.value)
//         }
//     });
//     let facilities = [];

//     edit_room_form.elements['facilities'].forEach(el => {
//         if (el.checked) {
//             // console.log(el.value);
//             facilities.push(el.value)
//         }
//     });

//     data.append('features', JSON.stringify(features));
//     data.append('facilities', JSON.stringify(facilities));

//     //AJAX CALL TO HANDLE FORM SUBMISSION
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "ajax/rooms.php", true);

//     xhr.onload = function() {
//         console.log(this.responseText);

//         var myModel = document.getElementById("edit-room");
//         var model = bootstrap.Modal.getInstance(myModel);
//         model.hide();

//         if (this.responseText == 1) {
//             alert('success', "Room Data Edited!");
//             edit_room_form.reset();
//             // get_features();
//         } else {
//             alert('error', "Server Down!")

//         }
//     }
//     xhr.send(data); //data will be send from here---->rooms.php
// }

function toggle_status(id, val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Successfully toggled.");
      get_all_rooms();
    } else {
      alert("error", " toggle failed.");
    }
  };
  xhr.send("toggle_status=" + id + "&value=" + val);
}

        // let add_image_form = document.getElementById('add_image_form');

        // add_image_form.addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     add_image();
        //     // console.log("clicked")
        // })


        // function add_image() {
        //   // console.log("cl");
        //   let data = new FormData();
        //   data.append("image", add_image_form.elements["image"].files[0]);
        //   data.append("room_id", add_image_form.elements["room_id"].value);
        //   data.append("add_image", "");

        //   //AJAX CALL TO HANDLE FORM SUBMISSION
        //   let xhr = new XMLHttpRequest();
        //   xhr.open("POST", "ajax/rooms.php", true);

        //   xhr.onload = function () {
        //     // console.log(this.responseText);

        //     if (this.responseText == "inv_img") {
        //       alert("error, Only JPG, WEBP and PNG file allowed");
        //     } else if (this.responseText == "inv_size") {
        //       alert("error", "image size must be less than 2MB!");
        //     } else if (this.responseText == "upd_failed") {
        //       alert("error", "uploading failed Server Down!");
        //     } else {
        //       alert("success", "New Image Added!");
        //       add_image_form.reset();
        //       // get_carousel();
        //     }
        //   };
        //   xhr.send(data);
        // }



window.onload = function () {
  get_all_rooms();
};
