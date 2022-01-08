
-- delete un candidat
delete from candidat where idcandidat=(select idutilisateur from utilisateur where adressemail = 'adresse-candidat@gmail.com1');
delete from competence where link='adresse-candidat@gmail.com1';
delete from renseignement where link='adresse-candidat@gmail.com1';
delete from utilisateur where adressemail='adresse-candidat@gmail.com1';
select * from utilisateur;

-- delete un offre
delete from competence where link='idoffre';
delete from renseignement where link='idoffre';
delete from utilisateur where adressemail='idoffre';
select * from utilisateur;