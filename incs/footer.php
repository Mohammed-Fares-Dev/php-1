</div>    

            
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
