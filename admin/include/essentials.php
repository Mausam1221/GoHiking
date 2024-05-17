<?php


//frontend data purpose
define('SITE_URL', 'http://127.0.0.1/GoHiking/');
define('ABOUT_IMG_PATH',SITE_URL.'images/about/');
define('CAROUSEL_IMG_PATH',SITE_URL.'images/carousel/');
define('FACILITIES_IMG_PATH',SITE_URL.'images/facilities/');
define('ROOMS_IMG_PATH',SITE_URL.'images/rooms/');
define('USERS_IMG_PATH',SITE_URL.'images/users/');


//backend upload process need this
define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT']. '/GoHiking/images/');//this gives the path of the file /UPLOAD_IMAGE_PATH STORES Applications/XAMPP/xamppfiles/htdocs
//we have to concatinate other file path /Applications/XAMPP/xamppfiles/htdocs/YT_Hotel_Booking/images

define('ABOUT_FOLDER','about/');
define('CAROUSEL_FOLDER','carousel/');
define('USERS_FOLDER','users/');
define('FACILITIES_FOLDER','facilities/');
define('ROOMS_FOLDER','rooms/');




function adminLogin(){
    session_start();
    if(!(isset($_SESSION['adminLogin'])&& $_SESSION['adminLogin']==true))
    {
        echo "<script>window.location.href='index.php'</script>";
        exit;
    }
    // session_regenerate_id(true);//this will generate new session id and will destroy the old one because session hijacking is a security risk.
}


function redirect($url){
    echo "<script>window.location.href='$url'</script>";
    exit;

}



function alert($type,$msg){
    $bs_class=($type=="success" ? "alert-success" : "alert-danger");
        echo <<<alert
                    <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                    <strong>$msg</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            alert;
}

function uploadImage($image,$folder){
    $valid_mime = ['image/jpeg','image/png','image/webp'];
    $img_mime = $image['type'];

    if(!in_array($img_mime,$valid_mime))//img_mime --> search in valid mime
    {
        return 'inv_img';//return invalid image or format
    }
    else if($image['size']/(1024*1024)>2){ //bite to kb --> to mb
        return 'inv_size';//return invalid size or greater than 2mb
    }
    else{
        $ext = pathinfo($image['name'],PATHINFO_EXTENSION);//store the name of the file in $ext variable without extension name like png,jpg without dot(.).
        $rname= 'IMG_'.random_int(11111,99999).".$ext";//output IMG34543.jpg
        $img_path = UPLOAD_IMAGE_PATH.$folder.$rname; //$folder settings_crud from 48 line ABOUT_FOLDER

        if(move_uploaded_file($image['tmp_name'],$img_path)){
            return $rname;
        }
        else{
            return 'upd_failed';
        }


    }
}


function deleteImage($image, $folder){
    if(unlink(UPLOAD_IMAGE_PATH.$folder.$image)){
        return true;
    }
    else{
        return false;
    }

}




function uploadSVGImage($image, $folder)
{
    $valid_mime = ['image/svg+xml'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) //img_mime --> search in valid mime
    {
        return 'inv_img'; //return invalid image or format
    } else if ($image['size'] / (1024 * 1024) > 1) { //bite to kb --> to mb
        return 'inv_size'; //return invalid size or greater than 2mb
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION); //store the name of the file in $ext variable without extension name like png,jpg without dot(.).
        $rname = 'IMG_' . random_int(11111, 99999) . ".$ext"; //output IMG34543.jpg
        $img_path = UPLOAD_IMAGE_PATH . $folder . $rname; //$folder settings_crud from 48 line ABOUT_FOLDER

        if (move_uploaded_file($image['tmp_name'], $img_path)) {
            return $rname;
        } else {
            return 'upd_failed';
        }
    }
}

function uploadUserImage($image)
{
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    if (!in_array($img_mime, $valid_mime)) //img_mime --> search in valid mime
    {
        return 'inv_img'; //return invalid image or format
    } else {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $rname = 'IMG_' . random_int(11111, 99999) . ".jpeg";
        $img_path = UPLOAD_IMAGE_PATH.USERS_FOLDER.$rname;

        if ($ext == 'png' || $ext == 'PNG') {
            $img = imagecreatefrompng($image['tmp_name']);
        } else if ($ext == 'webp' || $ext == 'WEBP') {
            $img = imagecreatefromwebp($image['tmp_name']);
        } else {
            $img = imagecreatefromjpeg($image['tmp_name']);
        }




        if (imagejpeg($img, $img_path, 75)) { //output image 
            return $rname;
        } else {
            return 'upd_failed';
        }
    }
}






?>