
/*


CE FICHIER EST FAIT POUR LES CHANGEMENT DES TABLES (MICRO AJOUTEMENTS CHANGEMENTS) DURANT NOTRE ITERATION 3


*/



ALTER TABLE utilisateur ALTER COLUMN password TYPE VARCHAR(255); -- Pour le hachage

--ALTER TABLE candidat DROP CONSTRAINT candidat_etape_check;

ALTER TABLE COMPETENCE ADD COLUMN link VARCHAR(30) NOT NULL; --ajout d'un attribut link pour resoudre un probleme de modelisation
ALTER TABLE RENSEIGNEMENT ADD COLUMN link VARCHAR(30) NOT NULL; --idem

ALTER TABLE entreprise ADD CONSTRAINT mailentreprise_constraint UNIQUE (mailentreprise); -- mettre le mail d'entreprise unique

--Changer la taille max des attributs
ALTER TABLE competence ALTER COLUMN nvetude TYPE varchar(255);
ALTER TABLE competence ALTER COLUMN langueparle TYPE varchar(255);
ALTER TABLE competence ALTER COLUMN langagesacquis TYPE varchar(255);
ALTER TABLE competence ALTER COLUMN link TYPE varchar(255);

--Changer la taille max des attributs
ALTER TABLE RENSEIGNEMENT ALTER COLUMN secteur TYPE varchar(255);
ALTER TABLE RENSEIGNEMENT ALTER COLUMN typecontrat TYPE varchar(255);
ALTER TABLE RENSEIGNEMENT ALTER COLUMN poste TYPE varchar(255);
ALTER TABLE RENSEIGNEMENT ALTER COLUMN tyeentreprise TYPE varchar(255);
ALTER TABLE RENSEIGNEMENT ALTER COLUMN link TYPE varchar(255);

-- Ajout le SERIAL sur l'attrbut id pour se incrementer automatiquement
ALTER TABLE RENSEIGNEMENT ALTER COLUMN idrenseignement SET DEFAULT nextval('renseignement_idrenseignement_seq');