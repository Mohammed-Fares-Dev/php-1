<?php
require_once 'config/config.php';
// echo password_hash('admin', PASSWORD_DEFAULT);
header('location: '.ROOT_URL.'users/');
exit();