

        let carousel_s_form= document.getElementById('carousel_s_form');
        let carousel_picture_inp = document.getElementById('carousel_picture_inp');




        carousel_s_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_image();

        })

        function add_image() {
            let data = new FormData();
            data.append('picture', carousel_picture_inp.files[0]); 
            data.append('add_image', '');

            //AJAX CALL TO HANDLE FORM SUBMISSION
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/carousel_crud.php", true);

            xhr.onload = function() {
                console.log(this.responseText);

                var myModel = document.getElementById("carousel-s");
                var model = bootstrap.Modal.getInstance(myModel);
                model.hide();

                if (this.responseText == 'inv_img') {
                    alert("error, Only JPG and PNG file allowed");
                    carousel_picture_inp.value = '';


                } else if (this.responseText == 'inv_size') {
                    alert('error', "image size must be less than 2MB!")
                    carousel_picture_inp.value = '';
                    
                } else if (this.responseText == 'upd_failed') {
                    alert('error', "uploading failed Server Down!")
                    carousel_picture_inp.value = '';

                } else {
                    alert('success', "New Image Added!");
                    carousel_picture_inp.value = '';
                    get_carousel();
                }
            }
            xhr.send(data); //data will be send from here---->settings_crud
        }


        function get_carousel() {

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/carousel_crud.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                // console.log(12);
                document.getElementById('carousel-data').innerHTML = this.responseText;
            }

            xhr.send("get_carousel"); //this will hits the settings_crud.php

        }


            function rem_image(val) { //val="sr_no" from settings_crud's html.
            // console.log(val);
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/carousel_crud.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', "Member Removed Successfully!");
                    get_carousel();
                } else {
                    alert('error', "Member Removed Failed")
                }
            }

            xhr.send('rem_image=' + val);
        }




        window.onload = function() {
            get_carousel();
        }