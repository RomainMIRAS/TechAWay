CREATE DATABASE techAWayDB;

REVOKE ALL PRIVILEGES ON DATABASE techAWayDB FROM PUBLIC; -- supprimer tous les droits de l'access a la base de donnes pour tous les utilisateur
-- On va cree des vues pour les select pour le user par defaut. Les autres a voir

CREATE USER defaultUser WITH password 'default'; -- l'utilisateur par defaut de la page

GRANT CONNECT ON DATABASE techAWayDB TO defaultUser;
GRANT SELECT ON UTILISATEUR TO defaultUser;



GRANT ALL PRIVILEGES ON DATABASE techAWayDB to defaultUser;