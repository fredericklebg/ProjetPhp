<?php

require_once 'models_base.php';

class user extends base

{
    private $pseudo;
    private $password;
    private $mail;
    private $user_id;
    private $state;
    private $phone;
    private $country;
    private $user_date;
    private $gender;
    private $password2;


    public function __construct()
    {

    }



    /**
     * @return mixed
     */
    public function getState()
    {
        //return $this->get('state',$pseudo);
        return $this->state;

    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getCountry()
    {
        return $this->country;;
    }

    public function getGender()
    {
       return $this->gender;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getUserDate()
    {
        return $this->user_date;
    }

    public function setCountry($country)
    {
        $query = ('UPDATE USER SET USER.country :=\''.$country.'\'');
        $this->execRequete($query);
    }

    public function setGender($gender)
    {
        $query = ('UPDATE USER SET USER.gender :=\''.$gender.'\'');
        $this->execRequete($query);
    }

    public function setMail($mail)
    {
        $query = ('UPDATE USER SET USER.mail :=\''.$mail.'\'');
        $this->execRequete($query);
    }

    public function setPassword($password)
    {
        $query = ('UPDATE USER SET USER.password :=\''.$password.'\'');
        $this->execRequete($query);
    }

    public function setPhone($phone)
    {
        $query = ('UPDATE USER SET USER.phone :=\''.$phone.'\'');
        $this->execRequete($query);
    }

    public function setPseudo($pseudo)
    {
        $query = ('UPDATE USER SET USER.pseudo :=\''.$pseudo.'\'');
        $this->execRequete($query);
    }

    public function setUserDate($user_date)
    {
        $query = ('UPDATE USER SET USER.date :=\''.$user_date.'\'');
        $this->execRequete($query);
    }

    public function setUserId($user_id)
    {
        $query = ('UPDATE USER SET USER.user_id :=\''.$user_id.'\'');
        $this->execRequete($query);
    }


    public function setState($state)
    {
        $query = ('UPDATE USER SET USER.state :=\''.$state.'\'');
        $this->execRequete($query);
    }

    public function isSafeForm() {
        $query = $this->loadDb()->prepare('SELECT pseudo FROM USER WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
        $query->execute();

        if(!preg_match("#^[0/+33]*[0-9][0-9]{8}$#",$_POST['phone']))
        {
            throw new Exception("Numéro de téléphone invalide");
        }

        if(empty($_POST['identifiant']))
        {
            throw new Exception("l'identifiant est vide");

        }


        if($query -> rowCount()==1)
        {
            throw new Exception("le pseudo a déja été pris, veuillez choisir un autre pseudo");
        }

        $query='SELECT mail FROM USER WHERE mail= \''.$this->mail.'\'';
        $row = $this->execRequete($query);

        if($row -> rowCount()==1)  {
            throw new Exception("l'adresse email est deja utilisée");
        }

        if(!filter_var($this->mail,FILTER_VALIDATE_EMAIL))
        {
            throw new Exception("l'adresse email est invalide");
        }

        if(is_null($this->password)|| is_null($this->password2))
        {
            throw new Exception("le mot de passe est vide");
        }



        if(strlen($this->password) <5 || strlen($this->password) >20)
        {
            throw new Exception("le mot de passe doit faire entre 5 et 20 caractères");
        }


        if($this->password != $this->password2)
        {
            throw new Exception("les mots de passe ne correspondent pas");
        }

     return true;
    }

    public function register()
    {


        $this->mail = htmlspecialchars($_POST['mail']);
        $this->password = htmlspecialchars($_POST['mdp']);
        $this->pseudo = htmlspecialchars($_POST['identifiant']);
        $this -> gender = htmlspecialchars($_POST['genre']);
        $this -> phone = htmlspecialchars($_POST['phone']);
        $this -> country = htmlspecialchars($_POST['pays']);
        $this -> state = 'member';
        $this-> password2 = htmlspecialchars($_POST['cmdp']);




        $hashedPass = hash('sha256',$this->password);


        $query = 'INSERT INTO USER (mail, pseudo, password, phone, country, user_date, gender, state)
        VALUES (
         \'' . $this->mail . '\' ,
         \'' . $this->pseudo . '\',
         \'' . $hashedPass . '\' ,
         \'' . $this->phone . '\' ,
         \'' . $this->country . '\',
         NOW(),
         \'' . $this->gender . '\' ,
         \'' . $this->state . '\'
         )';

        if(!preg_match('#^[a-zA-Z0-9àáâãäåçèéêëìíîïðòóôõöùúûüýÿ_]*$#', $this->pseudo))
        {
            throw new Exception("le pseudo n'est pas autorisé");
        }

        if ($this->isSafeForm()) {
            try {

                $this->execRequete($query);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }




    }


    public function login()
    {

        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['mdp']);
        $hashedPass = hash('sha256',$password);


        $sql = $this->loadDb()->prepare("SELECT * FROM USER WHERE  pseudo= :pseudo AND password= :password");
        $sql->bindValue(':pseudo',$login,PDO::PARAM_STR);
        $sql->bindValue(':password',$hashedPass,PDO::PARAM_STR) ;
        $sql->execute();



        if(!preg_match('#^[a-zA-Z0-9_]*$#', $login))
        {
            throw new Exception("le pseudo n'est pas autorisé");
        }

        try
        {
            if($sql->rowCount()==0)
            {
                throw new Exception("mauvais pseudo ou mot de passe");

            }
            else
            {

                $_SESSION['isLogin'] = 'ok';
                $this->password=$hashedPass;
                $this->pseudo=$login;
                $this->user_id=$this->get('user_id',$login,$hashedPass);
                $this->mail=$this->get('mail',$login,$hashedPass);
                $this->phone=$this->get('phone',$login,$hashedPass);
                $this->country=$this->get('country',$login,$hashedPass);
                $this->user_date=$this->get('user_date',$login,$hashedPass);
                $this->state=$this->get('state',$login,$hashedPass);
                $this->gender=$this->get('gender',$login,$hashedPass);
            }


        }

    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
    }


    public function changePassword()
    {
        if($_SESSION['isLogin']!='ok')
        {
            throw new Exception("vous n'etes pas connectés");
        }


        $login = $this->pseudo;
        $pass = $this->password;
        $oldMdp=htmlspecialchars($_POST['oldMdp']);
        $newMdp=htmlspecialchars($_POST['newMdp']);
        $confirmMdp=htmlspecialchars($_POST['confirmMdp']);

        if(strlen($newMdp) <5 || strlen($newMdp) >20 )
        {
            throw new Exception("le mot de passe doit faire entre 5 et 20 caracteres");
        }

        if ($newMdp != $confirmMdp)
        {
            throw new Exception("les  nouveaux mots de passe ne corespondent pas");
        }
        $hashedOldPass = hash('sha256',$oldMdp);
        $hashedNewPass = hash('sha256',$newMdp);

        if ($hashedOldPass == $pass)

        {
            try
            {
                $query = $this->loadDb()->prepare('UPDATE USER SET password = :password WHERE pseudo = :pseudo  AND password = :pass');
                $query->bindValue(':password',$hashedNewPass,PDO::PARAM_STR);
                $query->bindValue(':pseudo',$login,PDO::PARAM_STR);
                $query->bindValue(':pass',$pass,PDO::PARAM_STR);
                $query->execute();
                $this->password = $hashedNewPass;
            }
            catch (PDOException $e)
            {
                echo $e->getMessage();
            }
        }
        else
        {
            throw new Exception("votre mot de passe actuel est faux");
;
        }


    }

    public function genererChaineAleatoire($longueur = 10)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++)
        {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
    }

    public function disconnect()
    {
        $_SESSION['isLogin']='no';
        //session_unset();
    }

      public function  sendToken() {
          $mailTok = htmlspecialchars($_POST['mailTok']);
          $_SESSION['mailTok']=$mailTok;
          $query = $this->loadDb()->prepare('SELECT mail FROM USER WHERE mail = :mail');
          $query->bindValue(':mail',$mailTok,PDO::PARAM_STR);
          $query->execute();
          if ($query->rowCount()==1) {
              $token=$this->genererChaineAleatoire();
              $_SESSION['token']=$token;
              mail($mailTok,'Changement de mot de passe','Utiliser ce code  :\''.$token.'\' sur la page ouverte de votre navigateur');
          }

          else {
              throw new Exception('Mail vide');
          }

      }
    public function replacePassword() {
        if($_SESSION['isLogin']=='ok'){
            throw new Exception('vous êtes déjà connecté');
        }
        $mail = $_SESSION['mailTok'];
        $token = htmlspecialchars($_POST['token']);
        $newMdp=htmlspecialchars($_POST['newMdp']);
        $confirmMdp=htmlspecialchars($_POST['confirmMdp']);
        if($_SESSION['token']!=$token) {
            throw new Exception('mauvais code');
        }
        if(strlen($newMdp) <5 || strlen($newMdp) >20 )
        {
            throw new Exception("le mot de passe doit faire entre 5 et 20 caracteres");
        }

        if ($newMdp != $confirmMdp)
        {
            throw new Exception("les  nouveaux mots de passe ne correspondent pas");
        }
        $hashedNewPass = hash('sha256',$newMdp);
        if($token == $_SESSION['token']) {
            try {
                $query = $this->loadDb()->prepare('UPDATE USER SET password = :password WHERE mail =:mail');
                $query->bindValue(':password',$hashedNewPass,PDO::PARAM_STR);
                $query->bindValue(':mail',$mail,PDO::PARAM_STR);
                $query->execute();
            }

            catch (PDOException $e){
                echo $e->getMessage();
            }
        }
    }
      public function sendMdp() {
          $mail = htmlspecialchars($_POST['mail']);
          $query = $this->loadDb()->prepare('SELECT mail FROM USER WHERE mail = :mail');
          $query->bindValue(':mail',$mail,PDO::PARAM_STR);
          $query->execute();
          if ($query->rowCount()==1) {

              $mdptemporaire = $this->genererChaineAleatoire();
              mail($mail, 'Changement de mot de passe', 'Mot de passe temporaire: \''.$mdptemporaire.'\'
              Veillez a bien changer votre mot de passe par la suite');
              $passwordHash = hash('sha256', $mdptemporaire);
              $query = $this->loadDb()->prepare('UPDATE USER SET password = :password WHERE mail = :mail');
              $query->bindValue(':password', $passwordHash, PDO::PARAM_STR);
              $query->bindValue('mail', $mail, PDO::PARAM_STR);
              $query->execute();
          }
          else {
              throw new Exception("Le mail est vide ou n'existe pas");
          }
      }
      public function showUser()
      {
          $db = $this->loadDb();
          $query = $db->query('SELECT * FROM USER ORDER BY user_id DESC');
          while($row = $query->fetch())
          {
              ?>
              <tr>
                  <td><?php echo $row['pseudo']  ?></td>

              </tr>
              <?php
          }

      }
        public function isAdmin($user) {
            $query = $this->loadDb()->prepare('SELECT * FROM USER WHERE pseudo = :pseudo and state=\'admin\'');
            $query->bindValue('pseudo',$user,PDO::PARAM_STR);
            $query->execute();
            if($query->rowCount()==1) return true;
            }


}




