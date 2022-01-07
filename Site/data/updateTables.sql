ALTER TABLE utilisateur ALTER COLUMN password TYPE VARCHAR(255); -- Pour le hachage

ALTER TABLE candidat DROP CONSTRAINT candidat_etape_check;

ALTER TABLE COMPETENCE ADD COLUMN link VARCHAR(30) NOT NULL;
ALTER TABLE RENSEIGNEMENT ADD COLUMN link VARCHAR(30) NOT NULL;

ALTER TABLE RENSEIGNEMENT ALTER COLUMN idrenseignement SET DEFAULT nextval('renseignement_idrenseignement_seq');

update Competence set link='.';
update COMPETENCE set link='adresse-candidat@gmail.com' where idcompetence=1;

update RENSEIGNEMENT set link='.';
update RENSEIGNEMENT set link='adresse-candidat@gmail.com' where idrenseignement=1;