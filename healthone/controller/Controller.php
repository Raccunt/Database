<?php
namespace controller;
include_once "view/View.php";
use view\View;
include_once "model/Patient.php";
include_once "model/Recept.php";
use model\Model;

class Controller
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View($this->model);
    }

    public function readPatientenAction()
    {
        $this->view->showPatienten();
    }

    public function showFormPatientAction($id = null)
    {
        $this->view->showFormPatienten($id);
    }

    public function createPatientAction()
    {
        $naam = filter_input(INPUT_POST, 'naam');
        $adres = filter_input(INPUT_POST, 'adres');
        $woonplaats = filter_input(INPUT_POST, 'woonplaats');
        $geboortedatum = filter_input(INPUT_POST, 'geboortedatum');
        $soortverzekering = filter_input(INPUT_POST, 'soortverzekering');
        $zknummer = filter_input(INPUT_POST, 'zknummer');
        $result = $this->model->insertPatient($naam, $adres, $woonplaats, $geboortedatum, $zknummer, $soortverzekering);
        $this->view->showPatienten($result);
    }

    public function updatePatientAction()
    {
        $id = filter_input(INPUT_POST, 'id');
        $naam = filter_input(INPUT_POST, 'naam');
        $adres = filter_input(INPUT_POST, 'adres');
        $woonplaats = filter_input(INPUT_POST, 'woonplaats');
        $geboortedatum = filter_input(INPUT_POST, 'geboortedatum');
        $zknummer = filter_input(INPUT_POST, 'zknummer');
        $soortverzekering = filter_input(INPUT_POST, 'soortverzekering');
        $result = $this->model->updatePatient($id, $naam, $adres, $woonplaats, $geboortedatum, $zknummer, $soortverzekering);
        $this->view->showPatienten($result);
    }

    public function deletePatientAction($id)
    {
        $result = $this->model->deletePatient($id);
        $this->view->showPatienten($result);
    }

    public function createReceptAction()
    {
        $naam = filter_input(INPUT_POST, 'naam');
        $datum = filter_input(INPUT_POST, 'datum');
        $duur = filter_input(INPUT_POST, 'duur');
        $dosis = filter_input(INPUT_POST, 'dosis');
        $result = $this->model->insertRecept($naam, $datum, $duur, $dosis);
        $this->view->showRecepten($result);
    }

    public function updateReceptAction()
    {
        $id = filter_input(INPUT_POST, 'id');
        $naam = filter_input(INPUT_POST, 'naam');
        $datum = filter_input(INPUT_POST, 'datum');
        $duur = filter_input(INPUT_POST, 'duur');
        $dosis = filter_input(INPUT_POST, 'dosis');
        $result = $this->model->updateRecept($id, $naam, $datum, $duur, $dosis);
        $this->view->showRecepten($result);

    }

    public function deleteReceptAction($id)
    {
        $result = $this->model->deleteRecept($id);
        $this->view->showRecepten($result);
    }
}