<?php



if(isset($_POST['delete_photo_user'])) {

    if(file_exists($_POST['url_photo'])) {
        unlink($_POST['url_photo']);
    }
}

if(isset($_POST['delete_photo'])) {
    if(file_exists($_POST['url_photo'])) {
        unlink($_POST['url_photo']);
    }
}