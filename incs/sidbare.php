<?php
// $d = new DataModel;

// if (checkPatientLogin()){
//   $rdvNbr = $d->getRdvNbrPatient($_SESSION['PATIENT_ID']);
//   // print_r($data);
// }
?>
<div class="sidebar <?= isset($sideBare) && $sideBare ? 'active' : 'active' /*null*/ ?>" id="sidenav">
    <div>
      <div class="sidebare_head px-3 pb-3 d-flex justify-content-between py-2">
          <h3 class="text-white "><?= APP_NAME ?></h3>
          <button class="btn close-btn d-block rounded shadow px-1  me-2 px-3 text-white"><i class="fa-solid fa-caret-left"></i></button>
      </div>
        <ul class="list-unstyled px-2">
        <?php if (checkUserLogin()) : ?>
          <li <?= isset($page) && $page === 'index' ? 'class="active"' : null; ?>><a href="<?= ROOT_URL ?>" class="text-decoration-none d-block px-3 py-3 fs-5"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
        <?php endif ?>
        </ul>
        </div>
        <div>
        <hr class="h-color mx-2">  
        <ul class="list-unstyled px-2">
          <?php if (checkUserLogin()) : ?>
            <li><a href="logout.php" class="text-decoration-none d-block px-3 py-3 fs-5"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a></li>
            <li <?= isset($page) && $page === 'profile' ? 'class="active"' : null; ?>><a href="profile.php" class="text-decoration-none d-block px-3 py-3 fs-5"><i class="fa-regular fa-user"></i> 
              <?php if (isset($_SESSION['USER_NAME'])) : ?>
                <?= ucwords($_SESSION['USER_NAME']) ?>
              <?php endif ?>
            </a></li>
          <?php else : ?>
            <li <?= isset($page) && $page === 'login' ? 'class="active"' : null; ?>><a href="<?= ROOT_URL ?>auth/login.php" class="text-decoration-none d-block px-3 py-3 fs-5"><i class="fa-solid fa-right-to-bracket"></i> Log In</a></li>
            <li <?= isset($page) && $page === 'signup' ? 'class="active"' : null; ?>><a href="<?= ROOT_URL ?>auth/signup.php" class="text-decoration-none d-block px-3 py-3 fs-5"><i class="fa-solid fa-arrow-right-to-bracket"></i> Sign Up</a></li>
            <?php endif ?>
            <li><a href="" class="text-decoration-none d-block px-3 py-3 fs-5"><i class="fa-solid fa-gears"></i> Settings</a></li>
          
      </ul>
      </div>
  </div>