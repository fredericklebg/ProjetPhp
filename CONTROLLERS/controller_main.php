<?php

require_once 'CONTROLLERS/controller_user.php';
require_once 'VIEWS/view_template.php';

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
                            $vue = new Vue("inscription");
                            $vue->generer(array());
                        }
                        if($action=='login')
                        {
                            $vue = new Vue("accueil");
                            $vue->generer(array());
                            $this->ctrlUser->login();

                        }
                        if($action=='changePass')
                        {
                            $vue = new Vue("accueil");
                            $vue->generer(array());
                            $this->ctrlUser->changePass();

                        }
                        if($action=='forgotPass')
                        {
                            $vue = new Vue("accueil");
                            $vue->generer(array());
                            $this->ctrlUser->forgotPass();
                        }
                        if($action=='disconnect')
                        {
                            $this->ctrlUser->disconnect();
                            $vue = new Vue("accueil");
                            $vue->generer(array());
                        }

                    }
                        else
                            throw new Exception("Identifiant d'action non valide");
                }
                    else
                        throw new Exception("Identifiant de page non défini");
            }

            else {  // aucune page définie : affichage de l'accueil
                $vue = new Vue("accueil");
                $vue->generer(array());
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}
