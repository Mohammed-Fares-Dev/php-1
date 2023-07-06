<?php
require_once '../incs/sessions.php';
require_once '../data/dataModel.php';
$d = new DataModel;



if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['delete_empl']))
    {

        
        $data = $d->supprime($_POST['id']);
        if ($data)
        {
            $_SESSION['delete_success'] = 'Deleted Succsessfuly';
            header('location: index.php');
            exit();
        }
        else
        {
            $_SESSION['delete_err'] = 'fail to delete';
            header('location: index.php');
            exit();
        }
        
    }
}

?>