<?php

include('ctrl.session_start.php');
include('ctrl.session_portal.php');
include('ctrl.login_check.php');

include('model/model.user.php');
include('model/model.photo.php');

include('view/view.rud_photo_users.php');
include("view/view.return.php");
