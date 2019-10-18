<?php

require_once 'controller_accueil.php';
require_once 'controller_requete.php';
require_once 'VIEWS/view_template.php';

class router{


    //* Route une requête entrante : exécute l'action associée
    public function routerRequete() {
        try {
            // Fusion des paramètres GET et POST de la requête
            $requete = new requete(array_merge($_GET, $_POST));

            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);

            $controleur->executerAction($action);
        }
        catch (Exception $e) {
            $this->gererErreur($e);
        }
    }


    // Crée le contrôleur approprié en fonction de la requête reçue
    private function creerControleur(requete $requete) {
        $controleur = "accueil";  // Contrôleur par défaut
        if ($requete->existeParametre('page')) {
            $controleur = $requete->getParametre('page');

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
        }
        else
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

    // Gère une erreur d'exécution (exception)
    private function gererErreur(Exception $exception) {
        $vue = new Vue('erreur');
        $vue->generer(array('msgErreur' => $exception->getMessage()));
    }
}