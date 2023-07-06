</div>    
<!-- <button class='btn btn-warning' id='fetch'>fetch</button> -->

  <!-- <script src="../js/bootstrap.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
  <!-- <script src="script.js"></script> -->
            
          </main>
        </div>
    </div>
    <script src="<?= ROOT_URL ?>js/okjs.js" defer></script>
    <script src="<?= ROOT_URL ?>js/myfuncs.js" defer></script>
    
    <?php if (isset($indexmodal)) : ?>
        <script src="<?= ROOT_URL ?>js/modalhandler.js" defer></script>
    <?php endif  ?>
    <?php if (isset($_SESSION['submitErr'])) : ?>
      <?php if ($_SESSION['submitErr'] === 'empty_fields_add' || $_SESSION['submitErr'] === 'email_exists' || $_SESSION['submitErr'] === 'fail' || $_SESSION['submitErr'] === 'rdv_already_taken' || $_SESSION['submitErr'] === 'time_err') : ?>
        <script src="<?= ROOT_URL ?>js/adderr.js" defer></script>
      <?php endif ?> 
      <?php unset($_SESSION['submitErr']) ?>
    <?php endif ?>  
</body>
</html>
