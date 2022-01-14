update from utilisateur 
set nom = 'nom',
set prenom = 'prenom',
set age = 'age',
set telephone = 'telephone'
where adressemail= '$mail';

update from candidat
set liencv = 'cv',
set lienlettremotivation = '',
set etape = 0,
set pays = 'p',
set ville = 'v'
where idcandidat in (select idutilisateur from utilisateur where adressemail='mail');

update from competence
set nvetude = 'pp',
set langueparle = 'pp',
set langagesacquis = 'pp'
where idcompetence = ccomp;

update from renseignement
set renseignement = bloae,
set secteur = 'pp',
set typecontrat = 'pp',
set poste = 'pp',
set tyeentreprise = 'pp'
where idrenseignement = ccomp;