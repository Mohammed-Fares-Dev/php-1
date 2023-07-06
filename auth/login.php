
<?php
$sideBare = true;
$page = "login";
require_once '../config/config.php';
require_once '../incs/sessions.php';
require_once '../data/dataModel.php';

userLog();
?>
<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!empty($_POST['email']) && !empty($_POST['pass']))
    {
        
        $log = new DataModel;

        $data = $log->authUser($_POST['email'],$_POST['pass']);

        if(!empty($data))
        {
            setUserSession($data['nom'] .' '. $data['prenom'],$data['departement'],$data['id']);
            userLog();
            
        }
        else 
        {
            $errlogin = 'username or password is incorect';
        }
    } else {
        $emailErr = empty($_POST['email']) ? 'email is required' : null ;
        $passErr = empty($_POST['pass']) ? 'password is required' : null ;
    }
}
?>
<?php require_once '../incs/header.php';?>
<br>
<br>
<br>
<br>
<div class="auth container mt-5">

    <?php if (isset($errlogin)) : ?>
        <div class="alert alert-danger"><?= $errlogin ?></div>
    <?php endif ?>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="POST" onsubmit="validateForm(event)">
        <div class="form-group">
            <label for="email">User Name</label>
            <input type="text" class="form-control <?= isset($emailErr) ? 'is-invalid' : null ?>" name="email" placeholder="Enter email" value="<?= $_POST['username']  ?? null  ?>">
            <?php if (isset($emailErr)) : ?>
                <div class="invalid-feedback">
                    <?= $emailErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control <?= isset($passErr) ? 'is-invalid' : null ?>" name="pass" placeholder="Password" value="<?= $_POST['pass'] ?? null ?>">
            <?php if (isset($passErr)) : ?>
                <div class="invalid-feedback">
                    <?= $passErr ?>
                </div>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary form-control mt-2">Submit</button>
    </form>

</div>


<?php require_once '../incs/footer.php';?>
