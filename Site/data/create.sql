-- Données d'un candidat (chercheur d'emploi)
CREATE TABLE CANDIDAT (
	idCandidat INTEGER PRIMARY KEY,
	nom TEXT,
	prenom TEXT,
	age INTEGER,
	adressePostale TEXT,
	telephone TEXT,
	lienCV TEXT
);

-- Données d'un coach
CREATE TABLE COACH (
	idCoach INTEGER PRIMARY KEY,
	adresseMail TEXT,
	nom TEXT,
	prenom TEXT
);

-- Données d'un client (entreprise)
CREATE TABLE CLIENT (
	idClient INTEGER PRIMARY KEY,
	nomClient TEXT,
	adressePostale TEXT,
	mailClient TEXT,
	telephone TEXT
);

-- Caractéristiques d'une offre d'emploi
CREATE TABLE OFFRE (
	idOffre INTEGER PRIMARY KEY,
	nomOffre TEXT,
	dateOffre DATE
);

-- Caractéristiques du login d'un candidat ou d'un coach
CREATE TABLE LOGIN (
	idLogin INTEGER PRIMARY KEY,
	adresseMail TEXT,
	password TEXT
);

-- Caractéristiques d'un message entre un candidat et son coach
CREATE TABLE Message (
	idMessage INTEGER PRIMARY KEY,
	message TEXT,
	dateEnvoi DATE
);

-- Details d'une offre d'emploi
CREATE TABLE DetailOffre (
	idDetailOffre INTEGER PRIMARY KEY,
	travEtranger TEXT,
	secteurOffre TEXT,
	typeContratOffre TEXT,
	posteOffre TEXT,
	typpeEntreprise TEXT
);

-- Competence requise par une offre d'emploi
CREATE TABLE CompetenceRequise (
	idCompetanceRequise INTEGER PRIMARY KEY,
	nvEtude TEXT,
	langueRequise TEXT,
	langageRequis TEXT
);

-- Preferences du candidat (chercheur d'emploi)
CREATE TABLE Preference (
	idPreference INTEGER PRIMARY KEY,
	secteurPref TEXT,
	typeContratPref TEXT,
	postePref TEXT,
	tyeEntreprisePref TEXT
);

-- Competences acquises par le candidat (chercheur d'emploi)
CREATE TABLE CompetenceAcquise (
	idCompetenceAcquise INTEGER PRIMARY KEY,
	nvEtude TEXT,
	langueParlee TEXT,
	langageAcquis TEXT
);













--
