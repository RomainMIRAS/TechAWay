---------------------------------------------------------------
-- Vue VActivitesFutures
-- Toutes les informations sur les activités dont la date de départ est ultérieure à la date du jour
-- Vue ordonnée sur la date de départ
---------------------------------------------------------------


select * from utilisateur where idutilisateur in (Select idCoach from coach);

