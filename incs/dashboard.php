<?php 
    include_once 'searchbare.php';
?>



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



<?php if(isset($data) && !empty($data)) : ?>
  <div class=" tables">
  <table class="table table-responsive-lg table-hover mt-5 ">
    <tr class="table-primary">
      
        <th>NOM & PRENOM</th>
        <th>DATE DE NAISSANCE</th>
        <th>ADDRESS</th>
        <!-- <th>ADDRESS</th> -->
        <th>SALAIRE</th>
        <th>EMAIL</th>
        <th>DATE EMBAUCHE</th>
        <th>DEPARTEMENT</th>
        <th>ACTION</th>
        <th>ACTION</th>
        </tr>
        <?php foreach($data as $info) : ?>
          <tr>
            <td><?= ucwords($info['nom'].' '.$info['prenom']) ?></td>
            <td><?= $info['date_naissance'] ?></td>
            <td><?= $info['adresse'] ?></td>
            <td><?= $info['salaire'] ?></td>
            <td><?= $info['email'] ?></td>
            <td><?= $info['date_embauche'] ?></td>
            <td><?= $info['departement'] ?></td>
              <td>
              <button type="button" class="btn btn-success" data-bs-toggle="modal" id="editBtn" data-bs-target="#staticBackdrop" data-bs-whatever="UpDate Doctor|Update|edit.php|<?= $info['id'] ?>&<?= $info['nom'] ?>&<?= $info['prenom'] ?>&<?= $info['email'] ?>&<?= $info['email'] ?>&<?= $info['adresse'] ?>&<?= $info['salaire'] ?>&<?= $info['date_naissance'] ?>&<?= $info['date_embauche'] ?>&<?= $info['departement'] ?>">
                Update
              </button>
              </td>
                  <td>
                    
                    <form action="delete.php" method="POST" onsubmit="confirmRedirect(event)">
                      <input type="hidden" name="id" value="<?= $info['id'] ?>">
                      <input type="submit" class="btn btn-danger" value="Supprime" name="delete_empl">
                    </form>
                  </td>
                
            </tr>
            <?php endforeach ?>
            </table>
            </div>
          <?php else : ?>
            <?php  $notfound = 'There is no employes'; ?>
            <a href="<?= ROOT_URL ?>users/" class="btn"><i class="fa-solid fa-arrows-rotate"></i></a>
            <h3 class="text-center text-decoration-underline mt-lg-5 mb-lg-5"><?= $searchErr ?? $notfound ?></h3>
          
            
            <?php endif ?>
        <button type="button" class="btn btn-info form-control mb-3" id="registerBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bs-whatever="Register Doctor|Ajouter|register.php">
          ajouter
        </button>
      
      <?php include_once 'modal.php' ?>
      