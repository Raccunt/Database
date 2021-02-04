<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/59de9335d0.js" crossorigin="anonymous"></script>

<?php


use controller\Controller;
include_once 'controller/Controller.php';
$controller = new Controller();

/* formulier met gegevens tonen om een rij bij te werken */
if(isset($_POST['showForm']))
    {
        $controller->showFormPatientAction( $_POST['showForm']);
    }
/* UPDATE: formulier afhandeling om een rij bij te werken */
else if(isset($_POST['update']))
    {
        $controller->updatePatientAction();
    }
/* CREATE:  formulier afhandeling nieuwe rij */
else if(isset($_POST['create']))
    {
        $controller->createPatientAction();
    }
/* DELETE:  verwijderen rijen */
else if(isset($_POST['delete']))
    {
        $controller->deletePatientAction($_POST['delete']);
    }
/*READ:  overzicht alle patienten */
else
    {
        $controller->readPatientenAction();
    }


if(isset($_POST['showFormRecept']))
{
    $controller->showFormReceptAction( $_POST['showFormRecept']);
}
else if(isset($_POST['updateRecept']))
{
    $controller->updateReceptAction();
}
else if(isset($_POST['createRecept']))
{
    $controller->createReceptAction();
}
else if(isset($_POST['deleteRecept']))
{
    $controller->deleteReceptAction($_POST['deleteRecept']);
}
else
{
    $controller->readReceptenAction();
}



