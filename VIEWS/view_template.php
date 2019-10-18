<?php

class Vue {

    // Nom du fichier associé à la vue
    private $file;
    // Titre de la vue (défini dans le fichier vue)
    private $title;

    public function __construct($action, $controleur = "") {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        $file = "VIEWS/";
        if ($controleur != "") {
            $file = $file . $controleur . "/";
        }
        $this->file = $file . $action . ".php";
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($file, $data) {
        if (file_exists($file)) {
            // Rend les éléments du tableau $data accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }

    // Génère et affiche la vue
    public function generer($data) {
        // Génération de la partie spécifique de la vue
            $content = $this->genererFichier($this->file, $data);
        // Génération du gabarit commun utilisant la partie spécifique
            $vue = $this->genererFichier('VIEWS/view_common.php',
                array('title' => $this->title, 'content' => $content));
        // Renvoi de la vue au navigateur
        echo $vue;
    }


}