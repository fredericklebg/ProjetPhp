<?php

require_once 'requete.php';

require_once 'VIEWS/view_template.php';
require_once 'MODELS/models_user.php';


abstract class controller_main {



    private $id;

    // Action à réaliser
    private $action;
    // Requête entrante
    protected $requete;

    private $user;

    // Définit la requête entrante
    public function setRequete(requete $requete) {
        $this->user = new user();
        $this->requete = $requete;
    }

    // Exécute l'action à réaliser
    public function executerAction($action) {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $classeControleur = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $classeControleur");
        }
    }

    public function traiterId($id)
    {
        $this->id=$id;
    }

//    public abstract function index();

    // Génère la vue associée au contrôleur courant
    protected function genererVue($donneesVue = array()) {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("controller_", "", $classeControleur);
        // Instanciation et génération de la vue
        $vue = new Vue($this->action, $controleur);
        $vue->generer($donneesVue);
    }


    public function inscription()
    {
        $this ->user ->register();
        $vue = new Vue('inscription');
        $vue->generer(array());
    }
    public function login()
    {

        $this ->user ->login();
        $_SESSION['user']=serialize($this->user); // permet de mettre l'objet user en dession
        $vue = new Vue($_GET['page']);             // pour y acceder, il faut le unsarialise()
        $vue->generer(array());                      // par exemple regardez dans profilePage ou dans addMessage pour recup l'id
    }

    public function changePass()
    {
        $user=unserialize($_SESSION['user']);
        echo $user->getPseudo();
        exit();
        $this->user->changePassword();
        $_SESSION['user']=serialize($this->user);
        $vue = new Vue($_GET['page']);
        $vue->generer(array());
    }
    public function Envoyer()
    {

        $this->user->sendToken();
        $_SESSION['user']=serialize($this->user);
        $vue = new Vue('sendToken');
        $vue->generer(array());
    }
    public function forgotMdp() {

        $vue = new Vue('forgotMdp');
        $vue->generer(array());
    }
    public function Remplacer () {

        $this->user->replacePassword();
        $_SESSION['user']=serialize($this->user);
        $vue = new Vue($_GET['page']);
        $vue->generer(array());
    }

    public function disconnect()
    {

        $this->user->disconnect();
        $vue = new Vue($_GET['page']);
        $vue->generer(array());
    }
    public function profilePage()
    {
        if($_SESSION['isLogin'] != 'ok')
            throw new Exception('vous n\'etes pas connectés !');
        $vue = new Vue('profilePage');
        $vue->generer(array());
    }
}