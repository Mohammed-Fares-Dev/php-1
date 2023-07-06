
<?php
$sideBare = true;
$page = "signup";
require_once '../config/config.php';
require_once '../incs/sessions.php';
require_once '../data/dataModel.php';

userLog();
?>
<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $d = new DataModel;
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ((!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['pass_r']) && !empty($_POST['dn']) && !empty($_POST['adrs']) && !empty($_POST['s'])  && !empty($_POST['de'])  && !empty($_POST['depr']) && !empty($_POST['cpass'])) && $_POST['pass_r'] === $_POST['cpass'])
    {
        
        $data = $d->checkIfUserExists($_POST['email']);
        if(empty($data))
        {
            $res = $d->registerUser($_POST['firstname'],$_POST['lastname'],$_POST['dn'],$_POST['adrs'],$_POST['s'],$_POST['de'],$_POST['depr']);
            if ($res)
            {
                $res = $d->creatUserAcount($_POST['email'],$_POST['pass_r'],$_SESSION['user_id']);
                if ($res)
                {
                    $errSignup = 'SUCCESS !!!!!';
                    $_SESSION['registredE'] = $_POST['email'];
                    $_SESSION['registredPass'] = $_POST['pass_r'];
                    header('location: '.ROOT_URL.'auth/login.php');
                    exit();
                }
                else
                {
                    $errSignup = 'sir at9awed !!!!!!!!';
                }
            }
            else
            {
                $errSignup = 'booooooooooooo !!!!!';

            }
        }
        else
        {
            $errSignup = 'email already taken';
        }
    } else {
  
        $firstnameErr = empty($_POST['firstname']) ? 'firstname is required' : null ;
        $lastnameErr = empty($_POST['lastname']) ? 'lastname is required' : null ;
        $dnErr = empty($_POST['dn']) ? 'dn is required' : null ;
        $adrsErr = empty($_POST['adrs']) ? 'adrs is required' : null ;
        $sErr = empty($_POST['s']) ? 's is required' : null ;
        $deErr = empty($_POST['de']) ? 'de is required' : null ;
        $deprErr = empty($_POST['depr']) ? 'depr is required' : null ;
        $passErr = empty($_POST['pass_r']) ? 'password is required' : null ;
        $cpassErr = $_POST['pass_r'] !== $_POST['cpass']  ? 'does\'nt match' : null ;
        $cpassErr = empty($_POST['cpass']) ? 'confirmer votre password' : null ;
    }
}
?>
<?php require_once '../incs/header.php';?>
<br>
<div class="auth container mt-5 ">

    <?php if (isset($errSignup)) : ?>
        <div class="alert alert-danger"><?= $errSignup ?></div>
    <?php endif ?>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="POST" class="<?= isset($username) || isset($username) ? 'was-validated' : null ?>">
        <div class="form-group">
            <label for="firstname">FIRSTNAME</label>
            <input type="text" class="form-control <?= isset($firstnameErr) ? 'is-invalid' : null ?>" name="firstname" placeholder="Enter nom" value="<?= $_POST['firstname'] ?? null ?>">
            <?php if (isset($firstnameErr)) : ?>
                <div class="invalid-feedback">
                    <?= $firstnameErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="lastname">LASTNAME</label>
            <input type="text" class="form-control <?= isset($lastnameErr) ? 'is-invalid' : null ?>" name="lastname" placeholder="Enter prenom" value="<?= $_POST['lastname'] ?? null ?>">
            <?php if (isset($lastnameErr)) : ?>
                <div class="invalid-feedback">
                    <?= $lastnameErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="dn">Date de naissance</label>
            <input type="date" class="form-control <?= isset($dnErr) ? 'is-invalid' : null ?>" name="dn" placeholder="Enter prenom" value="<?= $_POST['dn'] ?? null ?>">
            <?php if (isset($dnErr)) : ?>
                <div class="invalid-feedback">
                    <?= $dnErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="adrs">Date de naissance</label>
            <input type="address" class="form-control <?= isset($adrsErr) ? 'is-invalid' : null ?>" name="adrs" placeholder="Enter prenom" value="<?= $_POST['adrs'] ?? null ?>">
            <?php if (isset($adrsErr)) : ?>
                <div class="invalid-feedback">
                    <?= $adrsErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="s">Salaire</label>
            <input type="number" class="form-control <?= isset($sErr) ? 'is-invalid' : null ?>" name="s" placeholder="Enter prenom" value="<?= $_POST['s'] ?? null ?>">
            <?php if (isset($sErr)) : ?>
                <div class="invalid-feedback">
                    <?= $sErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="de">Date d'embauche</label>
            <input type="date" class="form-control <?= isset($deErr) ? 'is-invalid' : null ?>" name="de" placeholder="Enter prenom" value="<?= $_POST['de'] ?? null ?>">
            <?php if (isset($deErr)) : ?>
                <div class="invalid-feedback">
                    <?= $deErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="depr">Departement</label>
                <select name="depr" class=" form-control form-select">
                    <?php foreach(DEPARTEMENTS as $dpr) : ?>
                      <option value="<?= $dpr ?>"><?= ucwords($dpr) ?></option>
                    <?php endforeach ?>
                </select>
            <?php if (isset($deprErr)) : ?>
                <div class="invalid-feedback">
                    <?= $deprErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="email">EMAIL</label>
            <input type="email" class="form-control <?= isset($emailErr) ? 'is-invalid' : null ?>" name="email" placeholder="Enter email" value="<?= $_POST['email'] ?? null ?>">
            <?php if (isset($emailErr)) : ?>
                <div class="invalid-feedback">
                    <?= $emailErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="phone">PHONE</label>
            <input type="phone" class="form-control <?= isset($phoneErr) ? 'is-invalid' : null ?>" name="phone" placeholder="Enter phone" value="<?= $_POST['phone'] ?? null ?>">
            <?php if (isset($phoneErr)) : ?>
                <div class="invalid-feedback">
                    <?= $phoneErr ?>
                </div>
            <?php endif ?>
        </div>
        
        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control <?= isset($passErr) ? 'is-invalid' : null ?>" name="pass_r" placeholder="Password" value="<?= $_POST['pass_r'] ?? null ?>">
            <?php if (isset($passErr)) : ?>
                <div class="invalid-feedback">
                    <?= $passErr ?>
                </div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label for="cpass">CONFIRM PASSWORD</label>
            <input type="password" class="form-control <?= isset($cpassErr) ? 'is-invalid' : null ?>" name="cpass" placeholder="confirmer le mot de pass" value="<?= $_POST['cpass'] ?? null ?>">
            <?php if (isset($cpassErr)) : ?>
                <div class="invalid-feedback">
                    <?= $cpassErr ?>
                </div>
            <?php endif ?>
        </div>
        <input type="submit" class="btn btn-primary form-control mb-5 mt-2" name="registerUser" value="register">
    </form>

</div>


<?php require_once '../incs/footer.php';?>
