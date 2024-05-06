                let feature_s_form = document.getElementById('feature_s_form');
                let facility_s_form = document.getElementById('facility_s_form');

                feature_s_form.addEventListener('submit', function(e) {
                    e.preventDefault(); //prevent submission of form
                    add_feature();
                });

                function add_feature() {

                    // console.log(feature_s_form.elements['feature_name'].value);
                    let data = new FormData();
                    data.append('name', feature_s_form.elements['feature_name'].value); //we are not using id to append data
                    data.append('add_feature', '');

                    //AJAX CALL TO HANDLE FORM SUBMISSION
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "ajax/features_facilities.php", true);

                    xhr.onload = function() {
                        console.log(this.responseText);

                        var myModel = document.getElementById("feature-s");
                        var model = bootstrap.Modal.getInstance(myModel);
                        model.hide();

                        if (this.responseText == 1) {
                            alert('success', "New Feature Added!");
                            feature_s_form.elements['feature_name'].value = '';
                            get_features();
                        } else {
                            alert('error', "Server Down!")

                        }
                    }
                    xhr.send(data); //data will be send from here---->settings_crud
                }

                function get_features() {
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "ajax/features_facilities.php", true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    xhr.onload = function() {
                        // console.log(12);
                        document.getElementById('features-data').innerHTML = this.responseText;
                    }

                    xhr.send("get_features"); //this will hits the features_facilities.php

                }

                function rem_feature(val) {
                    // console.log(val);
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "ajax/features_facilities.php", true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    xhr.onload = function() {
                        if (this.responseText == 1) {
                            alert('success', "Feature Removed Successfully!");
                            get_features();
                        } else {
                            alert('error', "Member Removed Failed")
                        }
                    }

                    xhr.send('rem_feature=' + val);
                }

                facility_s_form.addEventListener('submit', function(e) {
                    e.preventDefault(); //prevent submission of form
                    add_facility();
                });

                function add_facility() {

                    // console.log(feature_s_form.elements['feature_name'].value);
                    let data = new FormData();
                    data.append('name', facility_s_form.elements['facility_name'].value); //we are not using id to append data
                    data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
                    data.append('desc', facility_s_form.elements['facility_desc'].value);
                    data.append('add_facility', '');

                    //AJAX CALL TO HANDLE FORM SUBMISSION
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "ajax/features_facilities.php", true);

                    xhr.onload = function() {
                        // console.log(this.responseText);

                        var myModel = document.getElementById("facility-s");
                        var model = bootstrap.Modal.getInstance(myModel);
                        model.hide();

                        if (this.responseText == 'inv_img') {
                            alert("error, Only SVG file allowed");


                        } else if (this.responseText == 'inv_size') {
                            alert('error', "image size must be less than 1MB!")


                        } else if (this.responseText == 'upd_failed') {
                            alert('error', "uploading failed Server Down!")

                        } else {
                            alert('success', "New Facility Added!");
                            facility_s_form.reset();
                            get_facilities();
                        }
                    }
                    xhr.send(data); //data will be send from here---->settings_crud
                }

                function get_facilities() {
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "ajax/features_facilities.php", true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    xhr.onload = function() {
                        // console.log(12);
                        document.getElementById('facilities-data').innerHTML = this.responseText;
                    }

                    xhr.send("get_facilities"); //this will hits the features_facilities.php

                }

                function rem_facility(val) {
                    // console.log(val);
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "ajax/features_facilities.php", true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    xhr.onload = function() {
                        if (this.responseText == 1) {
                            alert('success', "Facility Removed Successfully!");
                            get_facilities();
                        } else {
                            alert('error', "Facility Removed Failed")
                        }
                    }

                    xhr.send('rem_facility=' + val);
                }






                window.onload = function() {
                    // this is used to get the data from db.
                    get_features();
                    get_facilities();

                }
            