-- Données d'un utilisateur (candidat ou coach)
CREATE TABLE UTILISATEUR (
	idUtilisateur INTEGER PRIMARY KEY, -- numéro unique de l'utilisateu
	nom TEXT, -- nom de l'utilisateur
	prenom TEXT, -- prenom de l'utilisateur
	age INTEGER, -- age de l'utilisateur
	telephone TEXT, --numéro de téléphone de l'utilisateur
	adresseMail TEXT, -- adresse email de l'utilisateur
	password TEXT, -- mot de passe de l'utilisateur
	dateCreation DATE -- date de création du compte
);

-- Données d'un coach
CREATE TABLE COACH (
	idCoach INTEGER PRIMARY KEY, -- numéro unique du coach
	lienPhoto TEXT -- lien vers la photo de profile du coach
);

-- Données d'un candidat
CREATE TABLE CANDIDAT (
	idCandidat INTEGER PRIMARY KEY, -- numéro unique du candidat
	lienCV TEXT, -- lien vers le CV du candidat
	etape INTEGER, -- étape du recrutement du candidat
	adressePostale TEXT -- adresse postale du candidat
);

-- Preferences du candidat (chercheur d'emploi)
CREATE TABLE RENSEIGNEMENT (
	idRenseignement INTEGER PRIMARY KEY, -- numéro du renseignement
	travEtranger TEXT, -- localisation du travail
	secteur TEXT, -- secteur de l'offre
	typeContrat TEXT, -- type de contrat en jeu
	poste TEXT, -- poste proposé par l'offre
	tyeEntreprise TEXT -- type d'entreprise
);

-- Competences
CREATE TABLE Competence (
	idCompetence INTEGER PRIMARY KEY, -- numero unique des compétences
	nvEtude TEXT, -- niveau d'études
	langueParlee TEXT, -- langues parlées
	langageAcquis TEXT -- Langages informatiques maitrisés
);


-- Caractéristiques d'une discussion entre un candidat et son coach
CREATE TABLE DISCUSSION (
		idDiscussion INTEGER PRIMARY KEY, -- numéro d'identification de la discussion
		dateDiscussion DATE -- date de la discussion
);

-- Caractéristiques d'un message dans une discussion
CREATE TABLE MESSAGE (
	idMessage INTEGER PRIMARY KEY, -- numéro unique du message
	contenuMessage DATE, -- contenu du message
	dateMessage DATE, -- date d'envoi du message
);




-- Données d'un client (entreprise)
CREATE TABLE ENTREPRISE (
	idEntreprise INTEGER PRIMARY KEY, -- numéro unique de l'entreprise
	nomEntreprise TEXT, -- nom de l'entreprise
	mailClient TEXT, -- adresse email de l'entreprise
	telephone TEXT, -- numéro de téléphone de l'enreprise
	adressePostale TEXT, -- adresse postale de l'entreprise
);

-- Caractéristiques d'une offre d'emploi
CREATE TABLE OFFRE (
	idOffre INTEGER PRIMARY KEY, -- numéro unique de l'offre
	nomOffre TEXT, -- nom de l'offre
	dateOffre DATE, -- date de publication de l'offre
);

-- Details d'une offre d'emploi
CREATE TABLE DetailOffre (
	idDetailOffre INTEGER PRIMARY KEY, -- numéro unique de l'offre
	travEtranger TEXT, -- trvail à l'étranger ?
	secteurOffre TEXT, -- secteur de l'offre
	typeContratOffre TEXT, -- type de contrat
	posteOffre TEXT -- poste proposé par l'offre
);

-- Competence requise par une offre d'emploi
CREATE TABLE CompetenceRequise (
	idCompetanceRequise INTEGER PRIMARY KEY, -- competences requises par le poste
	nvEtude TEXT, -- niveau d'étude demandé
	langueRequise TEXT -- langue requise pour le poste
);













--
