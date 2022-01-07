ALTER TABLE utilisateur ALTER COLUMN password TYPE VARCHAR(255); -- Pour le hachage

ALTER TABLE candidat DROP CONSTRAINT candidat_etape_check;

ALTER TABLE COMPETENCE ADD COLUMN link VARCHAR(30) NOT NULL;
ALTER TABLE RENSEIGNEMENT ADD COLUMN link VARCHAR(30) NOT NULL;

update Competence set link='.';
update COMPETENCE set link='adresse-candidat@gmail.com' where idcompetence=1;

update RENSEIGNEMENT set link='.';
update RENSEIGNEMENT set link='adresse-candidat@gmail.com' where idcompetence=1;