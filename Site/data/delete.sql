
-- delete un candidat
delete from candidat where idcandidat=(select idutilisateur from utilisateur where adressemail = 'adresse-candidat@gmail.com1');
delete from competence where link='adresse-candidat@gmail.com1';
delete from renseignement where link='adresse-candidat@gmail.com1';
delete from utilisateur where adressemail='adresse-candidat@gmail.com1';
select * from utilisateur;

-- delete un offre
delete from offre where idoffre='idoffre';
delete from competence where link='idoffre';
delete from renseignement where link='idoffre';
select * from offre;

--delete tests
delete from offre where nomoffre='Back-End - WebApp';
delete from competence where langagesacquis='react,angular,scss,sass';
delete from renseignement where poste='Dynamic Websites,3d animation';
