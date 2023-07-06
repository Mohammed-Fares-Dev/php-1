
<?php 
$modaltype = "register&edit";
$page = 'index';
require_once '../incs/sessions.php';
require_once '../incs/header.php';

userNotLog();

$d = new DataModel;

if (checkUserLogin()){
  $data = $d->getALLEmployes();
  // print_r($data);
}
else {
  $data = null;
}





?>





    


<?php if (checkUserLogin()): ?>
  <main class="main p-3 active">
    <div class="mt-5" style="height:50px"></div>
    <h1 class=" text-center">Bonjour <?= ucwords($_SESSION['USER_NAME']) ?? 'Employe' ?> !</h1>
    
    <?php include_once '../incs/dashboard.php' ?>
    <div class="container-fluid" style="height: 100px;"></div>
    
  </main>
<?php endif ?>  
                
      
<?php require_once '../incs/footer.php';?>

      
