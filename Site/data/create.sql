-- Données d'un utilisateur (candidat ou coach)
CREATE TABLE UTILISATEUR (
<<<<<<< HEAD
	idUtilisateur INTEGER NOT NULL PRIMARY KEY, -- numéro unique de l'utilisateur
	adresseMail VARCHAR(30) NOT NULL CHECK (adresseMail in '%@%.%'), -- adresse email de l'utilisateur, chaine qui comprend le caractère ‘@’ et ‘.’
	password VARCHAR NOT NULL CHECK (password > 8), -- mot de passe de l'utilisateur qui doit être suppérieur à 8 caractères
	nom VARCHAR(30) NOT NULL, -- nom de l'utilisateur
	prenom VARCHAR(30) NOT NULL, -- prenom de l'utilisateur
	age INTEGER NOT NULL, -- age de l'utilisateur
	telephone VARCHAR(13) NOT NULL, --numéro de téléphone de l'utilisateur
	dateCreation DATE NOT NULL -- date de création du compte
=======
	idUtilisateur INTEGER PRIMARY KEY, -- numéro unique de l'utilisateu
	nom TEXT, -- nom de l'utilisateur
	prenom TEXT, -- prenom de l'utilisateur
	age INTEGER, -- age de l'utilisateur
	telephone TEXT, --numéro de téléphone de l'utilisateur
	adresseMail TEXT, -- adresse email de l'utilisateur
	password TEXT, -- mot de passe de l'utilisateur
	dateCreation DATE -- date de création du compte
>>>>>>> f9d1bf9d35c87017d158051c0d92f38940bacac9
);

-- Données d'un client (entreprise)
CREATE TABLE ENTREPRISE (
	idEntreprise INTEGER NOT NULL PRIMARY KEY, -- numéro unique de l'entreprise
	nomEntreprise VARCHAR(30), -- nom de l'entreprise
	mailEntreprise VARCHAR(30) NOT NULL CHECK (mailEntreprise in '%@%.%'), -- adresse email de l'entreprise,  chaine qui comprend le caractère ‘@’ et ‘.’
	telephone VARCHAR(13) NOT NULL, -- numéro de téléphone de l'enreprise
	adressePostale VARCHAR NOT NULL, -- adresse postale de l'entreprise
);

-- Competences
CREATE TABLE COMPETENCES(
	idCompetence INTEGER NOT NULL PRIMARY KEY, -- numero unique des compétences
	nvEtude VARCHAR NOT NULL, -- niveau d'études
	langueParle VARCHAR NOT NULL, -- langues parlées
	langagesAcquis TEXT NOT NULL -- Langages informatiques maitrisés
);

-- Renseignements du candidat (chercheur d'emploi)
CREATE TABLE RENSEIGNEMENT (
	idRenseignement INTEGER NOT NULL PRIMARY KEY, -- numéro du renseignement
	travEtranger BOOLEAN NOT NULL DEFAULT false, -- localisation du travail
	secteur VARCHAR DEFAULT NULL, -- secteur de l'offre
	typeContrat VARCHAR DEFAULT NULL, -- type de contrat en jeu
	poste VARCHAR DEFAULT NULL, -- poste proposé par l'offre
	tyeEntreprise VARCHAR DEFAULT NULL -- type d'entreprise
);

-- Données d'un candidat
CREATE TABLE CANDIDAT (
	idCandidat INTEGER NOT NULL PRIMARY KEY, -- numéro unique du candidat
	lienCV VARCHAR DEFAULT NULL, -- lien vers le CV du candidat
	lienLettreMotivation VARCHAR DEFAULT NULL,
	etape INTEGER CHECK (0 <= etape AND etape >= 4) DEFAULT 0, -- étape du recrutement du candidat
	pays VARCHAR NOT NULL,
	ville VARCHAR NOT NULL,
	idCompetence INTEGER NOT NULL,
	idRenseignement INTEGER NOT NULL,
	FOREIGN KEY(idCandidat) REFERENCES UTILISATEUR(idUtilisateur),
	FOREIGN KEY(idCompetence) REFERENCES COMPETENCES(idCompetence),
	FOREIGN KEY(idRenseignement) REFERENCES RENSEIGNEMENT(idRenseignement)
);

-- Caractéristiques d'une offre d'emploi
CREATE TABLE OFFRE (
	idOffre INTEGER NOT NULL PRIMARY KEY, -- numéro unique de l'offre
	nomOffre VARCHAR(30) NOT NULL, -- nom de l'offre
	dateOffre DATE, -- date de publication de l'offre
	idEntreprise INTEGER NOT NULL,
	idCompetence INTEGER NOT NULL,
	idRenseignement INTEGER NOT NULL,
	FOREIGN KEY(idEntreprise) REFERENCES ENTREPRISE(idEntreprise),
	FOREIGN KEY(idCompetence) REFERENCES COMPETENCES(idCompetence),
	FOREIGN KEY(idRenseignement) REFERENCES RENSEIGNEMENT(idRenseignement)
);

-- Données d'un coach
CREATE TABLE COACH (
	idCoach INTEGER NOT NULL PRIMARY KEY, -- numéro unique du coach
	lienPhoto TEXT, -- lien vers la photo de profile du coach
	FOREIGN KEY(idCoach) REFERENCES	UTILISATEUR(idUtilisateur)
);

CREATE TABLE POSTULE(
	idCandidat INTEGER NOT NULL,
	idOffre INTEGER NOT NULL,
	datePostule DATE NOT NULL,
	PRIMARY KEY(idCandidat, idOffre),
	FOREIGN KEY(idCandidat) REFERENCES CANDIDAT(idCandidat),
	FOREIGN KEY(idOffre) REFERENCES OFFRE(idOffre)
)

-- Caractéristiques d'une discussion entre un candidat et son coach
CREATE TABLE DISCUSSION (
		idDiscussion INTEGER NOT NULL PRIMARY KEY, -- numéro d'identification de la discussion
		idCoach INTEGER NOT NULL,
		idCandidat INTEGER NOT NULL,
		dateDiscussion DATE NOT NULL,-- date de la discussion
		FOREIGN KEY(idCoach) REFERENCES COACH(idCoach),
		FOREIGN KEY(idCandidat) REFERENCES CANDIDAT(idCandidat)
);

-- Caractéristiques d'un message dans une discussion
CREATE TABLE MESSAGE (
	idMessage INTEGER NOT NULL PRIMARY KEY, -- numéro unique du message
	idDiscussion INTEGER NOT NULL,
	contenuMessage VARCHAR NOT NULL, -- contenu du message
	dateMessage TIMESTAMPTZ NOT NULL, -- date d'envoi du message
	FOREIGN KEY(idDiscussion) REFERENCES DISCUSSION(idDiscussion)
);
