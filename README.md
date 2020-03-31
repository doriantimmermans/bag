# BAG

Site de la Boite-à-Gants, récupérathèque de l'ERG.

## Gestion des Glocks

La gestions des glocks est réalisée grâce à une base de donnée MySQL controlé en php avec PDO (PHP Data Objects).

L'interface ADMIN est protégé par un mot de passe chiffré dans un .txt. 
Une foi le mot de passe rentré une variable $_SESSION en .php est ouverte qui donne accès à différentes actions.

Une première table de la bdd ('user') stocke les usager.ère.s avec leurs nombre de glocks.
Un formulaire d'inscription permet d'ajouter un.e usager.ère à la bdd.
Une requête sql affiche les comptes de tout les usager.ère.s, un bouton pour chaque compte permet d'ajouter/retirer des Glocks.

Une deuxième table de la bdd ('journal') stocke chaque action ('Ajout', 'Décompte', 'Inscription', 'Désinscription').
Une requête sql affiche un historique de toutes les actions effectuées, triées par date.
On peut égaler utiliser cette table pour afficher les statistiques de ventes / achats de la récupérathèque.

## Gestion du Blog

Une table ou chaque entrée est un post.
