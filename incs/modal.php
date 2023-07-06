<?php
$formhandling = true;
$indexmodal = true;
?>
<div class="modal fade text-start" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="staticBackdropLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if (isset($_SESSION['submitErr'])) : ?>
              <?php if ($_SESSION['submitErr'] === 'empty_fields_add' || $_SESSION['submitErr'] === 'empty_fields_edit') : ?>
                <div class="alert alert-danger">all fields are required</div>
              <?php elseif ($_SESSION['submitErr'] === 'fail' || $_SESSION['submitErr'] === 'fail_edit') : ?>
                <div class="alert alert-danger">fail to add rdv 404 !!!</div>
              <?php elseif ($_SESSION['submitErr'] === 'email_exists' || $_SESSION['submitErr'] === 'email_exists_edit') : ?>
                <div class="alert alert-danger">email alrady exists</div>
              <?php elseif ($_SESSION['submitErr'] === 'rdv_already_taken' || $_SESSION['submitErr'] === 'rdv_already_taken_edit') : ?>
                <div class="alert alert-danger">rdv alrady exists</div>
              <?php elseif ($_SESSION['submitErr'] === 'time_err' || $_SESSION['submitErr'] === 'time_err_edit') : ?>
                <div class="alert alert-danger">rdv doit etre dans le future</div>
              <?php endif ?>
              
            <?php endif ?>
              <form action="" method="POST" id="userForm" enctype="multipart/form-data" onsubmit="validateForm(event)">
              <div class="modal-body">
                  <input type="hidden" class="form-control" placeholder="entrer nom" name="id">
                  <label for="">Nom</label>
                  <input type="text" class="form-control" placeholder="entrer nom" name="n">
                  <label for="">Prenom</label>
                  <input type="text" class="form-control" placeholder="entrer prenom" name="pn">
                  <label for="">Email</label>
                  <input type="email" class="form-control" placeholder="entrer email" name="e">
                  <input type="hidden" name="old_email">
                  <?php if (isset($page) && $page === 'profile') : ?>
                    <label for="">Password</label>
                    <input type="text" class="form-control" placeholder="entrer email" name="pass">
                    <input type="hidden" class="form-control" placeholder="entrer email" name="old_pass">
                  <?php endif ?>
                  <label for="">Address</label>
                  <input type="text" class="form-control" placeholder="entrer address" name="adrs">
                  <label for="">Salaire</label>
                  <input type="number" class="form-control" placeholder="entrer salaire" name="s">
                  <label for="">Date de naissance</label>
                  <input type="date" class="form-control" placeholder="entrer email" name="dn">
                  <label for="">Date d'embauche</label>
                  <input type="date" class="form-control" placeholder="entrer dn" name="de">
                  <label>Departement</label>
                  <select name="depr" class=" form-control form-select">
                    <?php foreach(DEPARTEMENTS as $dpr) : ?>
                      <option value="<?= $dpr ?>"><?= ucwords($dpr) ?></option>
                    <?php endforeach ?>
                  </select>
                  
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary form-control" value="">
              </div>
            </form>
          </div>
        </div>
      </div>
