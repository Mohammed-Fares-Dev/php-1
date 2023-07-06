<?php
require_once '../incs/sessions.php';
require_once '../data/dataModel.php';
$d = new DataModel;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!empty($_POST['n']) && !empty($_POST['pn']) && !empty($_POST['adrs']) && !empty($_POST['dn']) && !empty($_POST['de']) && !empty($_POST['depr']) && !empty($_POST['e']))
    {
        $check = $d->checkIfUserExists($_POST['e']);
        if (!$check)
        {
            
            $res = $d->registerUser($_POST['n'],$_POST['pn'],$_POST['dn'],$_POST['adrs'],$_POST['s'],$_POST['de'],$_POST['depr']);
            if ($res)
            {
                $res = $d->creatUserAcount($_POST['e'],MOT_DE_PASS_PAR_DEFAULT,$_SESSION['user_id']);
                if ($res)
                {
                    $_SESSION['register_success'] = 'Registred successfuly !';
                    header('location: '.ROOT_URL);
                }
                else
                {
                    $_SESSION['register_err'] = 'fail to register !';
                    header('location: '.ROOT_URL);
                }
            }
            else
            {
                $_SESSION['register_err'] = 'fail to register !';
                header('location: '.ROOT_URL);
            }
        }
        else
        {
  
            $_SESSION['submitErr'] = 'email_exists';
            $_SESSION['register_err'] = 'email already exists !';
            header('location: '.ROOT_URL);
            // header('location: index.php?submitErr=email_exists');
        }
    }
    else{
        $_SESSION['submitErr'] = 'empty_fields_add';
        $_SESSION['register_err'] = 'all fields are required !';
        header('location: '.ROOT_URL);
        // header('location: index.php?submitErr=empty_fields_add');
    }

}

?>