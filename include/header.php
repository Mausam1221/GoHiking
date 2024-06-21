<nav id="nav-bar" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="gohiking-removebg-preview.png" alt="" srcset=""style="height: 60px;width: 60px;"><?php echo $settings_r['site_title'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="about.php">About Us</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php 
                    // session_destroy();
                    // print_r($_SESSION);

                    if(isset($_SESSION['login'])&& $_SESSION['login']==true)
                    {
                        $path=USERS_IMG_PATH;
                        echo <<<data
                        <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <img src="$path$_SESSION[uPic]"style="width:35px;height:35px;" class="me-1">
                            $_SESSION[uName]
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a button class="dropdown-item" href="index.php">Profile</a></li>
                            <li><a button class="dropdown-item" href="">Bookings</a></li>
                            <li><a button class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                        </div>
                        data;
                    }
                    else
                    {
                        echo<<<data
                        <button type="submit" class="btn btn-outline-dark me-3  ms-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                            LOGIN
                        </button>
                        <button type="submit" class="btn btn-outline-dark me-3  ms-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                            REGISTER

                        data;
                    }
                ?>
                </button>
            </div>
            <!-- Login Modal -->
            <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="login-form">
                            <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    <i class="bi bi-person-circle fs-3 me-2">
                                    </i>
                                    User Registration
                                </h5>
                                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">
                                        Email / Phone
                                    </label>
                                    <input type="text" name="email_mob" required class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        Password
                                    </label>
                                    <input type="password" name="pass" required class="form-control shadow-none">
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <button type="submit" class="btn btn-dark shadow-none">
                                        LOGIN
                                    </button>
                                    <!--default is also submit -->
                                    <a href="javascript: void(0)" class="text-decoration-none 
                                    -secondary">
                                        Forget Password
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Register Modal -->
            <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- <form id="register-form" method="POST" action="../YT_Hotel_Booking/ajax/login_register.php"> -->
                        <form id="register-form">

                            <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    <i class="bi bi-person-lines-fill fs-3 me-2"></i>
                                    </i>
                                    New User Registration
                                </h5>
                                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">NOTE:Your
                                    details must match with the details of you ID card(Citizenship Card,Driving
                                    License,Passport,etc)</span>

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label ">Name</label>
                                            <input name="name" type="name" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 p-0 mb-3">
                                            <label class="form-label">Email address</label>
                                            <input name="email" type="email" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Phone No</label>
                                            <input name="phonenum" type="number" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 p-0 mb-3">
                                            <label class="form-label ">Picture</label>
                                            <input name="profile" type="file" accept=".jpg, .jpeg, .webp, .png" class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-12 p-0 mb-3">
                                            <label class="form-label">Address</label>
                                            <textarea name="address" class="form-control shadow-none " required rows="1"></textarea>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label ">Pin code</label>
                                            <input name="pincode" type="number" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 p-0 mb-3">
                                            <label class="form-label ">Date of Birth</label>
                                            <input name="dob" type="date" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label ">Password</label>
                                            <input name="pass" type="password" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 p-0 mb-3">
                                            <label class="form-label ">Confirm Password</label>
                                            <input name="cpass" type="password" class="form-control shadow-none" required>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="text-center my-1">
                                <button type="submit" class="btn btn-dark shadow-none">
                                    REGISTER
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- we write the code to submit our registration form in footer.php bcz header and footer are in every page -->
        </div>
</nav>
<script>
    function alert(type, msg) {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;
        document.body.appendChild(element);
        setTimeout(remAlert, 3000);
    }

    function remAlert() {
        document.getElementsByClassName('alert')[0].remove();
    }





    // let register_form = document.getElementById('register-form');

    // register_form.addEventListener('submit', (e) => 
    // {
    //     e.preventDefault();
    //     console.log("hello");

    //     let data = new FormData();
    //     data.append('name', register_form.elements['name'].value);

    //     data.append('email', register_form.elements['email'].value);

    //     data.append('phonenum', register_form.elements['phonenum'].value);

    //     data.append('address', register_form.elements['address'].value)

    //     data.append('pincode', register_form.elements['pincode'].value)

    //     data.append('dob', register_form.elements['dob'].value);

    //     data.append('pass', register_form.elements['pass'].value);

    //     data.append('cpass', register_form.elements['cpass'].value);

    //     data.append('profile', register_form.elements['profile'].files[0]) //one file only

    //     data.append('register', '');





    //     var myModel = document.getElementById('registerModal');
    //     var model = bootstrap.Modal.getInstance(myModel);
    //     model.hide();


    //     let xhr = new XMLHttpRequest();
    //     xhr.open("POST", "ajax/login_register.php", true);

    //     xhr.onreadystatechange = function() 
    //         {
    //             if (this.readyState == 4 && this.status == 200) {
    //                 console.log(this.responseText);
    //             }
    //         }

    //         xhr.onload = function() {
    //         if (this.responseText == 'pass_mismatch') {
    //             alert('error', "password mismatched");
    //         } else if (this.responseText == 'email_already') {
    //             alert('error', "email already registered");
    //         } else if (this.responseText == 'phone_already') {
    //             alert('error', "phone number already used.");
    //         } else if (this.responseText == 'inv_img') {
    //             alert('error', "only JPG,PNG & WEBP are allowed.");
    //         } else if (this.responseText == 'upd_failed') {
    //             alert('error', "upload image failed");
    //         } else if (this.responseText == 'ins_failed') {
    //             alert('error', "Registration failed!");
    //         } else {
    //             alert('success', "Account has been created.");
    //             register_form.reset();

    //         }
    //     }


    //     xhr.send(data);


    // })
</script>