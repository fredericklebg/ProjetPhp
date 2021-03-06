<?php

require_once 'controller_main.php';
require_once 'requete.php';
require_once 'VIEWS/view_template.php';

class router
{

    //* Route une requête entrante : exécute l'action associée

    //* Crée le contrôleur approprié en fonction de la requête reçue

   /* {  */   public function routerRequete()
    {
        try {
            // Fusion des paramètres GET et POST de la requête
            $requete = new requete(array_merge($_GET, $_POST));

            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);
            $id = $this->creerId($requete);
            $controleur->executerAction($action);
            $controleur->traiterId($id);
        } catch (Exception $e) {
            $this->gererErreur($e);
        }
    }


     private function creerControleur(requete $requete)
     {
        $controleur = "accueil";  // Contrôleur par défaut
        if ($requete->existeParametre('page')) {
            $controleur = $requete -> getParametre('page');

        }
        // Création du nom du fichier du contrôleur
        $classeControleur = "controller_" . $controleur;
        $fichierControleur = "CONTROLLERS/" . $classeControleur . ".php";
        if (file_exists($fichierControleur)) {
            // Instanciation du contrôleur adapté à la requête
            require($fichierControleur);
            $controleur = new $classeControleur();
            $controleur->setRequete($requete);
            return $controleur;
        } else
            throw new Exception("Fichier '$fichierControleur' introuvable");
        }



    // Détermine l'action à exécuter en fonction de la requête reçue
    private function creerAction(requete $requete) {
        $action = "index";  // Action par défaut
        if ($requete->existeParametre('action')) {
            $action = $requete->getParametre('action');
        }
        return $action;
    }


    //determine l'id pour les discussions
    private function creerId(requete $requete)
    {
        $id =0; //id de base
        if($requete->existeParametre('id'))
        {
            $id = $requete->getParametre('id');
        }
        return $id;
    }



    // Gère une erreur d'exécution (exception)
    private function gererErreur(Exception $exception) {
        $vue = new Vue('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()));
    }
}
