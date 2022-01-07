delete from candidat where idcandidat=(select idutilisateur from utilisateur where adressemail = 'raniazouita@icloud.com');
delete from competence where link='raniazouita@icloud.com';
delete from renseignement where link='raniazouita@icloud.com';
delete from utilisateur where adressemail='raniazouita@icloud.com';
select * from utilisateur;