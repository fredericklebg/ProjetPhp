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
        $_SESSION['user']=serialize($this->user); // permet de mettre l'objet user en session
        //$vue = new Vue($_GET['page']);             // pour y acceder, il faut le unsarialise()
        //$vue->generer(array());                      // par exemple regardez dans profilePage ou dans addMessage pour recup l'id
        header("Location: http://tpphp.alwaysdata.net/ProjetPhp");
    }

    public function changePass()
    {
        $user=unserialize($_SESSION['user']);
        $user->changePassword();
        $_SESSION['user']=serialize($user);
        header("Location: http://tpphp.alwaysdata.net/ProjetPhp");
    }
    public function Envoyer()
    {

        $user=new user();
        $user->sendToken();
        $vue = new Vue('sendToken');
        $vue->generer(array());
    }
    public function forgotMdp() {

        $vue = new Vue('forgotMdp');
        $vue->generer(array());
    }
    public function Remplacer () {

        $user=new user();
        $user->replacePassword();
        header("Location: http://tpphp.alwaysdata.net/ProjetPhp");
    }

    public function disconnect()
    {

        $user=unserialize($_SESSION['user']);
        $user->disconnect();
        unset($user);
        $_SESSION['user']=null;
        header("Location: http://tpphp.alwaysdata.net/ProjetPhp");
    }
    public function profilePage()
    {
        if($_SESSION['isLogin'] != 'ok')
            throw new Exception('vous n\'etes pas connectés !');
        $vue = new Vue('profilePage');
        $vue->generer(array());
    }
}