<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4 ">
            <h3 class="fs-3 fw-bold"><?php echo $settings_r['site_title'] ?></h3>
            <p><?php echo $settings_r['site_about'] ?></p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-2">Links</h5>
            <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
            <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Room</a><br>
            <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About Us</a><br>
            <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a><br>

        </div>
        <div class="col-lg-4 p-4">
            <h5>Follow Us</h5>
            <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-2 text-dark text-decoration-none">
                <i class="bi bi-facebook me-2"></i>Facebook</a><br />
            <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-2 text-dark text-decoration-none">
                <i class="bi bi-instagram me-2"></i>Instagram</a><br />
            <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block mb-2 text-dark text-decoration-none">
                <i class="bi bi-twitter-x me-2"></i>Twitter</a><br />
            <!-- <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">
                    <i class="bi bi-whatsapp me-2"></i>Whatsapp</a><br/> -->
        </div>
    </div>
</div>

<h6 class="text-center fs-5 bg-dark text-white m-0 p-3">Design by Lorem, ipsum dolor.</h6>

<!-- bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


<script>
// function setActive() {
//     let navbar = document.getElementById('nav-bar');
//     let a_tags = document.getElementsByTagName('a');
//     for (i = 0; i <= a_tags.length; i++) {
//         let file = a_tags[i].href.split('/').pop();
//         let file_name = file.split('.')[0];
//         if (document.location.href.indexOf(file_name) >= 0) {
//             a_tags[i].classList.add('active');
//         }
//     }
// }
// setActive();




let register_form = document.getElementById('register-form');

register_form.addEventListener('submit', (e) => {
    e.preventDefault();
    // console.log("hello");

    let data = new FormData();
    data.append('name', register_form.elements['name'].value);
    data.append('email', register_form.elements['email'].value);
    data.append('phonenum', register_form.elements['phonenum'].value);
    data.append('address', register_form.elements['address'].value)
    // data.append('pincode', register_form.elements['pincode'].value)
    // data.append('dob', register_form.elements['dob'].value);
    data.append('pass', register_form.elements['pass'].value);
    data.append('cpass', register_form.elements['cpass'].value);
    // data.append('profile', register_form.elements['profile'].files[0]) //one file only
    data.append('register', '');

    var myModel = document.getElementById('registerModal');
    var model = bootstrap.Modal.getInstance(myModel);
    model.hide();


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');



    xhr.onload = function() {
        if (this.responseText == 'pass_mismatch') {
            alert('error', "password mismatched");
        } else if (this.responseText == 'email_already') {
            alert('error', "email already registered");
        } else if (this.responseText == 'phone_already') {
            alert('error', "phone number already used.");
        } else if (this.responseText == 'inv_img') {
            alert('error', "only JPG,PNG & WEBP are allowed.");
        } else if (this.responseText == 'upd_failed') {
            alert('error', "upload image failed");
        } else if (this.responseText == 'ins_failed') {
            alert('error', "Registration failed!");
        } else {
            alert('success', "Account has been created.");
            register_form.reset();

        }

    }



    xhr.send(data);




})
let login_form = document.getElementById('login-form');

login_form.addEventListener('submit', (e) => {
    e.preventDefault();
    // console.log("hello");

    let data = new FormData();
    data.append('email_mob', login_form.elements['email_mob'].value);
    data.append('pass', login_form.elements['pass'].value);
    data.append('login', '');

    var myModel = document.getElementById('loginModal');
    var model = bootstrap.Modal.getInstance(myModel);
    model.hide();


    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/login_register.php", true);
    // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');



    xhr.onload = function() {
        if (this.responseText == 'inv_email_mob') {
            alert('error', "incorrect email or password ");
        } else if (this.responseText == 'inv_pass') {
            alert('error', "Password incorrect");
        } else {
            window.location = window.location.pathname;
        }
    }



    xhr.send(data);




})
</script>