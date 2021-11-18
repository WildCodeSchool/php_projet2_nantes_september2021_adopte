AdopteUnChat.com

Bonjour à tous ! Bienvenue sur notre site d'adoption de chat tout mignon. Ils sont en recherche d'une famille aimante et de bons soins. 

Simple MVC

Description
This repository is a simple PHP MVC structure from scratch.
It uses some cool vendors/libraries such as Twig and Grumphp. For this one, just a simple example where users can choose one of their databases and see tables in it.

Steps
1 - Clone the repo from Github.
2 - Run composer install.
3 - Create config/db.php from config/db.php.dist file and add your DB parameters. Don't delete the .dist file, it must be kept.
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');

1 - Import database.sql in your SQL server, you can do it manually or use the migration.php script which will import a database.sql file.
2 - Run the internal PHP webserver with php -S localhost:8000 -t public/. The option -t with public as parameter means your localhost will target the /public folder.
3 - Go to localhost:8000 with your favorite browser or click on http://localhost:8000/

Pour l'accès à la partie admin : http://localhost:8000/private/connexion
utilisateur : "admin"
mdp : "admin"