-- Données d'un utilisateur (candidat ou coach)
CREATE TABLE UTILISATEUR (
	idUtilisateur SERIAL INTEGER NOT NULL PRIMARY KEY, -- identifiant unique de l'utilisateur
	adresseMail VARCHAR(30) UNIQUE NOT NULL CHECK (adresseMail in '%@%.%'), -- adresse email de l'utilisateur, chaine qui comprend le caractère ‘@’ et ‘.’
	password VARCHAR(30) NOT NULL CHECK (password > 8), -- mot de passe de l'utilisateur qui doit être suppérieur à 8 caractères
	nom VARCHAR(30) NULL, -- nom de l'utilisateur
	prenom VARCHAR(30) NULL, -- prenom de l'utilisateur
	age INTEGER NULL, -- age de l'utilisateur
	telephone VARCHAR(30) NULL, --numéro de téléphone de l'utilisateur
	dateCreation DATE NOT NULL -- date de création du compte
)

-- Données d'un coach
CREATE TABLE COACH (
	idCoach INTEGER NOT NULL PRIMARY KEY, -- identifiant unique du coach
	lienPhoto VARCHAR(30) NOT NULL, -- lien vers la photo de profile du coach
	FOREIGN KEY(idCoach) REFERENCES	UTILISATEUR(idUtilisateur) -- un coach est un utilisateur
);


-- Competences
CREATE TABLE COMPETENCE(
	idCompetence SERIAL UNIQUE INTEGER NOT NULL PRIMARY KEY, -- identifiant unique des compétences
	nvEtude VARCHAR(30) NOT NULL, -- niveau d'études
	langueParle VARCHAR(30) NOT NULL, -- langues parlées
	langagesAcquis VARCHAR(30) NOT NULL -- Langages informatiques maitrisés
);

-- Renseignements du candidat (chercheur d'emploi)
CREATE TABLE RENSEIGNEMENT (
	idRenseignement SERIAL UNIQUE INTEGER NOT NULL PRIMARY KEY, -- idenifiant unique du renseignement
	travEtranger BOOLEAN NOT NULL DEFAULT FALSE, -- localisation du travail
	secteur VARCHAR(30) NULL, -- secteur de l'offre
	typeContrat VARCHAR(30) NULL, -- type de contrat en jeu
	poste VARCHAR(30) NULL, -- poste proposé par l'offre
	tyeEntreprise VARCHAR(30) NULL -- type d'entreprise
);

-- Données d'un candidat
CREATE TABLE CANDIDAT (
	idCandidat INTEGER NOT NULL PRIMARY KEY, -- identifiant unique du candidat
	lienCV VARCHAR(30) NULL, -- lien vers le CV du candidat
	lienLettreMotivation VARCHAR(30) NULL, -- lien vers la lettre de motivation du candidat
	etape INTEGER CHECK (0 <= etape AND etape >= 4) DEFAULT 0, -- étape du recrutement du candidat
	pays VARCHAR(30) NULL, -- pays où vit le candidat
	ville VARCHAR(30) NULL, -- ville où vit le candidat
	idCompetence INTEGER NULL, -- compétences du candidat
	idRenseignement INTEGER NULL, -- préfrérences du candidat enregistrées dans la table RENSEIGNEMENT
	FOREIGN KEY(idCandidat) REFERENCES UTILISATEUR(idUtilisateur), -- un candidat est un utilisateur
	FOREIGN KEY(idCompetence) REFERENCES COMPETENCES(idCompetence),
	FOREIGN KEY(idRenseignement) REFERENCES RENSEIGNEMENT(idRenseignement)
);

-- Données d'un client (entreprise)
CREATE TABLE ENTREPRISE (
	idEntreprise SERIAL UNIQUE INTEGER NOT NULL PRIMARY KEY, -- identifiant unique de l'entreprise
	nomEntreprise VARCHAR(30) NOT NULL, -- nom de l'entreprise
	mailEntreprise VARCHAR(30) NOT NULL CHECK (mailEntreprise in '%@%.%'), -- adresse email de l'entreprise,  chaine qui comprend le caractère ‘@’ et ‘.’
	telephone VARCHAR(30) NOT NULL, -- numéro de téléphone de l'enreprise
	pays VARCHAR(30) NULL, -- pays où vit le candidat
	ville VARCHAR(30) NULL, -- ville où vit le candidat
);


-- Caractéristiques d'une offre d'emploi
CREATE TABLE OFFRE (
	idOffre INTEGER NOT NULL PRIMARY KEY, -- identifiant unique de l'offre
	nomOffre VARCHAR(30) NOT NULL, -- nom de l'offre
	dateOffre DATE, -- date de publication de l'offre
	idEntreprise INTEGER NOT NULL, -- entreprise qui publie l'offre
	idCompetence INTEGER NOT NULL, -- compétences requises par l'entreprise
	idRenseignement INTEGER NOT NULL, -- informations de l'entreprise enregistrées dans la table RENSEIGNEMENT
	FOREIGN KEY(idEntreprise) REFERENCES ENTREPRISE(idEntreprise),
	FOREIGN KEY(idCompetence) REFERENCES COMPETENCES(idCompetence),
	FOREIGN KEY(idRenseignement) REFERENCES RENSEIGNEMENT(idRenseignement)
);

--
CREATE TABLE POSTULE(
	idCandidat INTEGER NOT NULL, -- candidat qui postule
	idOffre INTEGER NOT NULL, -- l'offre à laquelle il postule
	datePostule DATE NOT NULL, -- date à laquelle le candidat postule à l'offre
	PRIMARY KEY(idCandidat, idOffre),
	FOREIGN KEY(idCandidat) REFERENCES CANDIDAT(idCandidat),
	FOREIGN KEY(idOffre) REFERENCES OFFRE(idOffre)
)

-- Caractéristiques d'une discussion entre un candidat et son coach
CREATE TABLE DISCUSSION (
		idDiscussion INTEGER NOT NULL PRIMARY KEY, -- numéro d'identification de la discussion
		idCoach INTEGER NOT NULL, -- identifiant du coach qui discute
		idCandidat INTEGER NOT NULL, -- identifiant du candidat qui discute
		dateDiscussion DATE NOT NULL,-- date de la discussion
		FOREIGN KEY(idCoach) REFERENCES COACH(idCoach),
		FOREIGN KEY(idCandidat) REFERENCES CANDIDAT(idCandidat)
);

-- Caractéristiques d'un message dans une discussion
CREATE TABLE MESSAGE (
	idMessage INTEGER NOT NULL PRIMARY KEY, -- numéro unique du message
	idDiscussion INTEGER NOT NULL, --discussion dans laquelle est le message
	contenuMessage VARCHAR(30) NOT NULL, -- contenu du message
	dateMessage TIMESTAMPTZ NOT NULL, -- date et heure de l'envoi du message
	FOREIGN KEY(idDiscussion) REFERENCES DISCUSSION(idDiscussion)
);
