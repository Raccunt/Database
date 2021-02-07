<?php
namespace view;
include_once ('model/Model.php');
include_once('model/Patient.php');

class View
{

    private $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function showPatienten($result = null){

        if($result == 1){
            echo "<h4> <span class=\"badge bg-warning\">Actie geslaagd</span></h4>";
        }
        $patienten = $this->model->getPatienten();

        /*de html template */
        echo "<!DOCTYPE html>
                <html lang=\"en\">
                <head>
                    <meta charset=\"UTF-8\">
                    <title> <span class=\"badge bg-secondary\">Overzicht patienten </span> </title>
                    <style>
                        #patienten{
                            display:grid;
                            grid-template-columns:repeat(4,1fr);                
                            grid-column-gap:10px;
                            grid-row-gap:10px;
                            justify-content: center;
                        }
                        .patient{
                            width:80%;
                            background-color:#ccccff;
                            color:darkslategray;
                            font-size:24px;
                            padding:10px;
                            border-radius:10px;
                        }
                    </style>
                </head>
                <body>";
                   echo "<h2><span class=\"badge bg-info\"><i class='fas fa-clinic-medical'></i> Patienten overzicht</span></h2> <form action='index.php' method='post'>
                               <input type='hidden' name='showForm' value='0'>
                               <button type='submit' class='btn btn-primary'><i class='fas fa-plus'></i> toevoegen</button>
                               
                               </form></div></body></html>";
                        if($patienten !== null) { echo "
                        <div id=\"patienten\">";
                            foreach ($patienten as $patient) {
                                echo "<div class=\"patient card text-white bg-secondary mb-3\">
                                        <div class=\"card-header\">
                                      $patient->naam</div>
                                      $patient->adres<br />
                                      $patient->woonplaats<br />
                                      $patient->zknummer<br />
                                      $patient->geboortedatum<br />
                                      $patient->soortverzekering<br />
                                      <form action='index.php' method='post'>
                                       <input type='hidden' name='showForm' value='$patient->id'>
                                       <button type='submit' class='btn btn-primary'><i class='fas fa-user-edit'></i> wijzigen </button>
                                       </form>
                                        <form action='index.php' method='post'>
                                       <input type='hidden' name='delete' value='$patient->id'>
                                       <button type='submit' class='btn btn-primary'><i class='fas fa-user-times'></i> verwijderen</button>
                                      
                                       </form>
                                    </div>";
                            }
                        }
                    else{
                        echo "Geen patienten gevonden";
                    }

    }
    public function showFormPatienten($id=null){
        if($id !=null && $id !=0){
            $patient = $this->model->selectPatient($id);
        }
        /*de html template */
        echo "<!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <title>Beheer patientengegevens</title>
        </head><body>
        <h2><span class=\"badge bg-info\"><i class='fas fa-plus'></i> Formulier patientgegevens</span></h2>";
    if(isset($patient)){
        echo "<form method='post' >
        <table>
            <tr><td></td><td>
                <input type=\"hidden\" name=\"id\" value='$id'/></td></tr>
             <tr><td>   <label for=\"naam\"  class=\"form-label\">Patient naam</label></td><td>
                <input type=\"text\" name=\"naam\"  class=\"form-control\" value= '".$patient->naam."'/></td></tr>
            <tr><td>
                <label for=\"adres\" class=\"form-label\">adres</label></td><td>
                <input type=\"text\" name=\"adres\" class=\"form-control\" value = '".$patient->adres."'/></td></tr>
            <tr><td>
                <label for=\"woonplaats\" class=\"form-label\">woonplaats</label></td><td>
                <input type=\"text\" name=\"woonplaats\" class=\"form-control\" value= '".$patient->woonplaats."'/></td></tr>
            <tr><td>
                <label for=\"geboortedatum\" class=\"form-label\">geboortedatum</label></td><td>
                <input type=\"text\" name=\"geboortedatum\" class=\"form-control\" value= '".$patient->geboortedatum."'/></td></tr>
            <tr><td>
                <label for=\"zknummer\" class=\"form-label\">zknummer</label></td><td>
                <input type=\"text\" name=\"zknummer\" class=\"form-control\" value= '".$patient->zknummer."'/></td></tr>
                 <tr><td>
                <label for=\"soortverzekering\" class=\"form-label\">soortverzekering</label></td><td>
                <input type=\"text\" name=\"soortverzekering\" class=\"form-control\" value= '".$patient->soortverzekering."'/></td></tr>
            <tr><td>
                <button type='submit' name='create' value='opslaan' class='btn btn-primary'> <i class='fas fa-save'></i> opslaan</button></td><td>
            </td></tr></table>
            </form>
        </body>
        </html>";
    }
    else{
        /*de html template */
        echo "<form method='post' action='index.php'>
        <table>
            <tr><td></td><td>
                <input type=\"hidden\" name=\"id\" value=''/></td></tr>
             <tr><td>   <label for=\"naam\" class=\"form-label\" >Patient naam</label></td><td>
                <input type=\"text\" name=\"naam\" class=\"form-control\" value= ''/></td></tr>
            <tr><td>
                <label for=\"adres\" class=\"form-label\">adres</label></td><td>
                <input type=\"text\" name=\"adres\" class=\"form-control\" value = ''/></td></tr>
            <tr><td>
                <label for=\"woonplaats\" class=\"form-label\">woonplaats</label></td><td>
                <input type=\"text\" name=\"woonplaats\" class=\"form-control\" value= ''/></td></tr>
            <tr><td>
                <label for=\"geboortedatum\" class=\"form-label\">geboortedatum</label></td><td>
                <input type=\"text\" name=\"geboortedatum\" class=\"form-control\" value= ''/></td></tr>
            <tr><td>
                <label for=\"zknummer\" class=\"form-label\">zknummer</label></td><td>
                <input type=\"text\" name=\"zknummer\" class=\"form-control\" value= ''/></td></tr>
                 <tr><td>
                <label for=\"soortverzekering\" class=\"form-label\">soortverzekering</label></td><td>
                <input type=\"text\" name=\"soortverzekering\" class=\"form-control\" value= ''/></td></tr>
            <tr><td>
                <button type='submit' name='create' value='opslaan' class='btn btn-primary'> <i class='fas fa-save'></i> opslaan</button></td><td>
            </td></tr></table>
            </form>
        </body>
        </html>";
    }
    }
}