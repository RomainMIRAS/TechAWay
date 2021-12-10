---------------------------------------------------------------
-- Vue VActivitesFutures
-- Toutes les informations sur les activités dont la date de départ est ultérieure à la date du jour
-- Vue ordonnée sur la date de départ
---------------------------------------------------------------


select * from utilisateur where idutilisateur in (Select idCoach from coach);


--View complete de Candidat
CREATE VIEW lecandidat AS 
select u.idUtilisateur, u.adresseMail, u.nom, u.prenom, u.age, u.telephone, c.lienCV, c.lienLettreMotivation, c.etape, c.pays, c.ville ,u.dateCreation from utilisateur u, candidat c where u.idUtilisateur in (select idCandidat from candidat );

CREATE VIEW lecoach AS 
select u.idUtilisateur, u.adresseMail, u.nom, u.prenom, u.age, u.telephone, c.lienPhoto from utilisateur u, coach c where u.idUtilisateur in (select idCoach from coach );
