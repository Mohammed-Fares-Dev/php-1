<?php
session_start();

require_once '../config/config.php';


function setUserSession ($name,$departement,$id)
{
    $_SESSION['USER_LOGIN'] = 'logedin';
    $_SESSION['USER_NAME'] = $name;
    $_SESSION['USER_DEPARTEMENT'] = $departement;
    $_SESSION['USER_ID'] = $id;
}


function checkUserLogin ()
{
    if (isset($_SESSION['USER_LOGIN']) && isset($_SESSION['USER_NAME']) && isset($_SESSION['USER_DEPARTEMENT']) && isset($_SESSION['USER_ID']) && $_SESSION['USER_LOGIN'] === 'logedin')
    {
        return true;
    }
    return false;
}


function userNotLog ()
{
    if (!checkUserLogin())
    {
        header('location: '.ROOT_URL.'auth/login.php');
        exit();
    }
}


function userLog ()
{
    if (checkUserLogin())
    {
        header('location: '.ROOT_URL.'users');
        exit();
    }
}























// function checkAdminLog ()
// {
//     if (isset($_SESSION['USER_PROFILE']) && $_SESSION['USER_DEPARTEMENT'] === 'administrator')
//     {
//         return true;
//     }
//     return false;
// }
