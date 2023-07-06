<form action="" class='form' method="POST" onsubmit="validateForm(event)">
    <div class="input-group mt-5">
      <input type="search" class="form-control rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="searchParam" />
      <button type="submit" class="btn btn-primary" style=" z-index : 0;">search</button>
    </div>
    
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    if (isset($_POST['searchParam']))
    {
        $searchParam = trim($_POST['searchParam']);
        $data = $d->recherch($searchParam);
        
        
    }
    if (!empty($data))
    {
        echo '<a href="'.ROOT_URL.'users/" class="btn"><i class="fa-solid fa-arrow-left"></i></a>';
    }
    elseif (empty($data))
    {
        $searchErr = '"' . $_POST['searchParam'] . '"' . ' Not Found';
    }
}
?>
