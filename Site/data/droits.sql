CREATE DATABASE techAWayDB;

REVOKE ALL PRIVILEGES ON DATABASE techAWayDB FROM PUBLIC; -- supprimer tous les droits de l'access a la base de donnes pour tous les utilisateur
-- On va cree des vues pour les select pour le user par defaut. Les autres a voir

CREATE USER pagman WITH password 'pagman'; -- l'utilisateur par defaut de la page

GRANT CONNECT ON DATABASE techAWayDB TO pagman;


--TABLE UTILISATEUR
GRANT SELECT ON UTILISATEUR TO pagman;
GRANT UPDATE ON UTILISATEUR TO pagman;
GRANT INSERT ON UTILISATEUR TO pagman;
GRANT USAGE ON SEQUENCE utilisateur_idutilisateur_seq to pagman ;

--TABLE COMPTETENCE
GRANT SELECT ON COMPETENCE TO pagman;
GRANT UPDATE ON COMPETENCE TO pagman;
GRANT INSERT ON COMPETENCE TO pagman;
GRANT USAGE ON SEQUENCE competence_idcompetence_seq to pagman ;

--TABLE RENSEIGNEMENTS
GRANT SELECT ON RENSEIGNEMENT TO pagman;
GRANT UPDATE ON RENSEIGNEMENT TO pagman;
GRANT INSERT ON RENSEIGNEMENT TO pagman;
GRANT USAGE ON SEQUENCE renseignement_idrenseignement_seq to pagman ;

--TABLE CANDIDAT
GRANT SELECT ON CANDIDAT TO pagman;
GRANT UPDATE ON CANDIDAT TO pagman;
GRANT INSERT ON CANDIDAT TO pagman;

--TABLE COACH
GRANT SELECT ON coach TO pagman;
GRANT USAGE ON SEQUENCE coach_idcoach_seq to pagman ;

--TABLE RENSEIGNEMENTS
GRANT SELECT ON ENTREPRISE TO pagman;
GRANT UPDATE ON ENTREPRISE TO pagman;
GRANT INSERT ON ENTREPRISE TO pagman;
GRANT USAGE ON SEQUENCE entreprise_identreprise_seq to pagman ;

--TABLE OFFRE
GRANT SELECT ON OFFRE TO pagman;
GRANT UPDATE ON OFFRE TO pagman;
GRANT INSERT ON OFFRE TO pagman;
GRANT USAGE ON SEQUENCE offre_idoffre_seq to pagman ;

--droits admin a romian
grant all ON ALL TABLES IN SCHEMA utilisateur to romain ;

GRANT ALL PRIVILEGES ON DATABASE techAWayDB to pagman;