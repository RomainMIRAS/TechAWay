CREATE DATABASE techAWayDB;

REVOKE ALL PRIVILEGES ON DATABASE techAWayDB FROM PUBLIC; -- supprimer tous les droits de l'access a la base de donnes pour tous les utilisateur
-- On va cree des vues pour les select pour le user par defaut. Les autres a voir

CREATE USER pagman WITH password 'pagman'; -- l'utilisateur par defaut de la page

GRANT CONNECT ON DATABASE techAWayDB TO pagman;
GRANT SELECT ON UTILISATEUR TO pagman;
GRANT INSERT ON UTILISATEUR TO pagman;
GRANT USAGE ON SEQUENCE utilisateur_idutilisateur_seq to pagman ;

--droits admin a romian
grant all ON ALL TABLES IN SCHEMA utilisateur to romain ;

GRANT ALL PRIVILEGES ON DATABASE techAWayDB to pagman;