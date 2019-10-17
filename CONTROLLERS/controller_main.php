<?php

require 'controller_user.php';
require '../VIEWS/view_template.php';

class controller_main
{
    private $ctrlUser;
    private $ctrlDisc;
    private $ctrlMsg;

    public function __construct() {
        $this->ctrlUser = new controller_user();
    }
    // Traite une requête entrante
    public function controlRequete() {
        try
        {
            if (isset($_GET['page']))
            {
                if ($_GET['page'] == 'user')
                {
                    if (isset($_GET['action']))
                    {
                        $action = $_GET['action'];
                        if($action=='inscription')
                        {
                            $this->ctrlUser->register();
                        }
                        if($action=='login')
                        {
                            $this->ctrlUser->login();
                        }
                        if($action=='changePass')
                        {
                            $this->ctrlUser->changePass();
                        }
                        if($action=='forgotPass')
                        {
                            $this->ctrlUser->forgotPass();
                        }
                    }
                        else
                            throw new Exception("Identifiant d'action non valide");
                }
                    else
                        throw new Exception("Identifiant d'action non défini");
            }

            else {  // aucune action définie : affichage de l'accueil
                $vue = new Vue("accueil");
                $vue->generer(null);
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}
