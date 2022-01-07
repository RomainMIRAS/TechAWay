delete from candidat where idcandidat=(select idutilisateur from utilisateur where adressemail = 'adresse-11candidat@gmail.com');
delete from competence where link='adresse-11candidat@gmail.com';
delete from renseignement where link='adresse-11candidat@gmail.com';
delete from utilisateur where adressemail='adresse-11candidat@gmail.com';
select * from utilisateur;