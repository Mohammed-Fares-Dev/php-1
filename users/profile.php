
<?php 
$modaltype = "register&edit";
$page = 'profile';
require_once '../incs/sessions.php';
require_once '../incs/header.php';

userNotLog();

$d = new DataModel;

if (checkUserLogin()){
  $data = $d->getALLEmployeById($_SESSION['USER_ID']);
  // print_r($data);
}
else {
  $data = null;
}





if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!empty($_POST['n']) && !empty($_POST['pn']) && !empty($_POST['adrs']) && !empty($_POST['dn']) && !empty($_POST['de']) && !empty($_POST['depr']) && !empty($_POST['e']) && !empty($_POST['id']))
    {
        if ($_POST['e'] !== $_POST['old_email'])
        {
            $check = $d->checkIfUserExists($_POST['e']);
            if (!$check)
            {
                $emailUpdate = $d->emailUpdate($_POST['e'],$_POST['id']);
                if ($emailUpdate)
                {
                    $data = $d->update($_POST['n'],$_POST['pn'],$_POST['s'],$_POST['adrs'],$_POST['dn'],$_POST['de'],$_POST['depr'],$_POST['id']);
                    if ($data)
                    {
                        $_SESSION['update_Success'] = 'updated successefuly !';
                        header('location: '.ROOT_URL.'users/profile.php');
                        exit();
                    }
                    else
                    {
                        $_SESSION['update_Success'] = 'update email successefuly !';
                        header('location: '.ROOT_URL.'users/profile.php');
                        exit();
                        
                    }
                }
                else
                {
                    $_SESSION['update_Err'] = 'update fail 2 !';
                    header('location: '.ROOT_URL.'users/profile.php');
                    exit();
                }
            }
            else
            {
                $_SESSION['update_Err'] = 'email already exists !';
                header('location: '.ROOT_URL.'users/profile.php');
                exit();
            }
        }
        if ($_POST['pass'] !== $_POST['old_pass'])
        {
            $passUp = $d->PassUpdate($_POST['pass'],$_POST['id']);
                if ($passUp)
                {
                    $data = $d->update($_POST['n'],$_POST['pn'],$_POST['s'],$_POST['adrs'],$_POST['dn'],$_POST['de'],$_POST['depr'],$_POST['id']);
                    if ($data)
                    {
                        $_SESSION['update_Success'] = 'updated successefuly !';
                        header('location: '.ROOT_URL.'users/profile.php');
                        exit();
                    }
                    else
                    {
                        $_SESSION['update_Success'] = 'update password successefuly !';
                        header('location: '.ROOT_URL.'users/profile.php');
                        exit();
                    }
                }
                else
                {
                    $_SESSION['update_Err'] = 'update fail 2 !';
                    header('location: '.ROOT_URL.'users/profile.php');
                    exit();
                }

        }
        else
        {
            $data = $d->update($_POST['n'],$_POST['pn'],$_POST['s'],$_POST['adrs'],$_POST['dn'],$_POST['de'],$_POST['depr'],$_POST['id']);
            if ($data)
            {
                $_SESSION['update_Success'] = 'updated successefuly !';
                header('location: '.ROOT_URL.'users/profile.php');
                exit();
            }
            else
            {
                $_SESSION['update_Err'] = 'update fail 3 !';
                header('location: '.ROOT_URL.'users/profile.php');
                exit();
            }
            
        }
    }
    else
    {
        $_SESSION['update_Err'] = 'All fields are required !';
        header('location: '.ROOT_URL.'users/profile.php');
        exit();

    }

}



?>

    


<?php if (checkUserLogin()): ?>
  <main class="main p-3 active">
    <div class="mt-5" style="height:50px"></div>
    
    <?php include_once '../incs/profile.php' ?>
    <div class="container-fluid" style="height: 100px;"></div>
    
  </main>
<?php endif ?>  
                
      
<?php require_once '../incs/footer.php';?>

      
