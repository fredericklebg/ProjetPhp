# ProjetPhp

Nom de l'équipe : ProjetPhp

URL de l'index du site Web : tpphp.alwaysdata.net/ProjetPhp



## Présentation du projet :

Freenote est un réseau social basé sur la communication par le biais de 
discussions amusantes. En effet, chaque utilisateur peut ajouter au maximum
deux mots par message ce qui donne des discussions assez originales.


### Les choix techniques :

Dans un premier temps, nous avons utilisé un motif d'architecturee
 logicielle étant le MVC (Modèle-vue-contrôleur). Ce dernier est composé de modèles
contenant les données à afficher, de vues contenant la présentation de l'interface graphique ainsi que des contrôleurs contenant la logique du code
en jouant le rôle d'intermédiaire entre les vues et les modèles. Le MVC nous à donc permis de séparer les données, l'interface graphique et la dynamique
de l'application mais aussi d'imposer une rigueur de développement, de mettre en place un espace de travail modulaire. Ce pattern est donc synonyme
d'organisation.
Nous avons aussi mis en place un routeur du fait de l'utilisation du pattern MVC dans le but que ce dernier devienne le point d'entrée de notre application
tout en redirigant toutes les URLs vers de fichier. Ce principe qui est inévitable lorsqu'on utilise le MVC permet alors de structurer l'application pour
ainsi faciliter son utilisation.
Le fait d'utiliser un routeur nous a conduit à utiliser un autre contrôleur appelé requete.php qui seront liés entre eux. Le routeur, va donc nous permettre
le routage de requête entrante ce qui revient à analyser la requête afin d'en déduire le contrôleur à utiliser et l'action à appeler tandis que le contrôleur
requête.php va permettre de modéliser les requêtes grâce à la classe requête. Encore une fois, cela nous a servis à structurer notre applicaton web et à consolider
notre organisation.
Dans le but de gagner du temps tout en facilitant notre projet, nous avons utilisé un framework CSS et HTML étant Bootstrap. Ce dernier est une collection
d'outils utiles pour le design d'applications web, il nous a notamment été utile pour le responsive ou encore certaines animations.

(pour accéder a la page de profil, cliquez sur l'icone de personnage en haut a droite du site)

### La configuration logicielle :


### Les identifiants de connexion :



#### administrateur :  

login   :   mdp  
- user123 : XxunderxX12  
- josee : josee


#### simple utilisateur :

login : mdp  
- louis : voiture123  
- thomas : ananas89  
- jeannot : lepastaga  
- harry : teatime  
- david : esplanada14  
- francis : francis  



#### Base de données :

- login phpmyadmin : tpphp
- mot de passe phpmyadmin : ericzemour

#### L'Hébergement sur alwaysdata :

- e-mail : alexpilous@gmail.com
- mot de passe : EricZemour

