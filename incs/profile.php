

<?php if(isset($_SESSION['delete_err'])) : ?>
  <div class="alert alert-danger w-25 mx-auto mt-4"><?= $_SESSION['delete_err'] ?></div>
  <?php
  unset($_SESSION['delete_err']);
  ?>
<?php endif ?>



<?php if(isset($_SESSION['add_spl_err'])) : ?>
  <div class="alert alert-danger w-25 mx-auto mt-4"><?= $_SESSION['add_spl_err'] ?></div>
  <?php
  unset($_SESSION['add_spl_err']);
  ?>
<?php endif ?>



<?php if(isset($_SESSION['update_Err'])) : ?>
  <div class="alert alert-danger w-25 mx-auto mt-4"><?= $_SESSION['update_Err'] ?></div>
  <?php
  unset($_SESSION['update_Err']);
  ?>
<?php endif ?>


<?php if(isset($_SESSION['update_Success'])) : ?>
  <div class="alert alert-success w-25 mx-auto mt-4"><?= $_SESSION['update_Success'] ?></div>
  <?php
  unset($_SESSION['update_Success']);
  ?>
<?php endif ?>


<?php if(isset($_SESSION['add_spl_success'])) : ?>
  <div class="alert alert-success w-25 mx-auto mt-4"><?= $_SESSION['add_spl_success'] ?></div>
  <?php
  unset($_SESSION['add_spl_success']);
  ?>
<?php endif ?>


<?php if(isset($_SESSION['add_rdv_success'])) : ?>
  <div class="alert alert-success w-25 mx-auto mt-4"><?= $_SESSION['add_rdv_success'] ?></div>
  <?php
  unset($_SESSION['add_rdv_success']);
  ?>
<?php endif ?>


<?php if(isset($_SESSION['delete_success'])) : ?>
  <div class="alert alert-success w-25 mx-auto mt-4"><?= $_SESSION['delete_success'] ?></div>
  <?php
  unset($_SESSION['delete_success']);
  ?>
<?php endif ?>
<div class="profile">
            <header class=" text-center">
                <i class="fa-regular fa-user fs-1"></i><br>
                <h1><?= ucwords($_SESSION['USER_NAME']) ?></h1>
            </header>
            <hr>

            <table class=" fs-2">
                <tr>
                    <td>Profile</td>
                    <td class=" px-4">:</td>
                    <td><?= ucwords($data['departement']) ?></td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td class=" px-4">:</td>
                    <td><?= ucwords($data['nom']) ?></td>
                </tr>
                <tr>
                    <td>Prenom</td>
                    <td class=" px-4">:</td>
                    <td><?= ucwords($data['prenom']) ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td class=" px-4">:</td>
                    <td><?= $data['email'] ?></td>
                </tr>
                <tr>
                    <td>adresse</td>
                    <td class=" px-4">:</td>
                    <td><?= $data['adresse'] ?></td>
                </tr>
                <tr>
                    <td>Salaire</td>
                    <td class=" px-4">:</td>
                    <td><?= $data['salaire'] ?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td class=" px-4">:</td>
                    <td><?= $data['pass'] ?></td>
                </tr>
                <tr>
                    <td>Date de naissance</td>
                    <td class=" px-4">:</td>
                    <td><?= $data['date_naissance'] ?></td>
                </tr>
                <tr>
                    <td>Date d'embauche</td>
                    <td class=" px-4">:</td>
                    <td><?= $data['date_embauche'] ?></td>
                </tr>
            </table>
            <hr>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" id="editBtn" data-bs-target="#staticBackdrop" data-bs-whatever=" Edit Profile|Update|profile.php|<?= $data['id'] ?>&<?= $data['nom'] ?>&<?= $data['prenom'] ?>&<?= $data['email'] ?>&<?= $data['email'] ?>&<?= $data['pass'] ?>&<?= $data['pass'] ?>&<?= $data['adresse'] ?>&<?= $data['salaire'] ?>&<?= $data['date_naissance'] ?>&<?= $data['date_embauche'] ?>&<?= $data['departement'] ?>">
            <i class="fa-solid fa-user-pen"></i> Edit Profile
            </button>
        </div>

        <?php
        require_once '../incs/modal.php'
        ?>