CREATE TABLE CANDIDAT (
	idCandidat INTEGER PRIMARY KEY,
	nom TEXT,
	prenom TEXT,
	age INTEGER,
	adressePostale TEXT,
	telephone TEXT,
	lienCV TEXT
);

CREATE TABLE COACH (
	idCoach INTEGER PRIMARY KEY,
	adresseMail TEXT,
	nom TEXT,
	prenom TEXT
);

CREATE TABLE CLIENT (
	idClient INTEGER PRIMARY KEY,
	nomClient TEXT,
	adressePostale TEXT,
	mailClient TEXT,
	telephone TEXT
);

CREATE TABLE OFFRE (
	idOffre INTEGER PRIMARY KEY,
	nomOffre TEXT,
	dateOffre DATE
);

CREATE TABLE LOGIN (
	idLogin INTEGER PRIMARY KEY,
	adresseMail TEXT,
	password TEXT
);

CREATE TABLE Message (
	idMessage INTEGER PRIMARY KEY,
	message TEXT,
	dateEnvoi TEXT
);

CREATE TABLE DetailOffre (
	idDetailOffre INTEGER PRIMARY KEY,
	travEtranger TEXT,
	secteurOffre TEXT,
	typeContratOffre TEXT,
	posteOffre TEXT,
	typpeEntreprise TEXT
);

CREATE TABLE CompetenceRequise (
	idCompetanceRequise INTEGER PRIMARY KEY,
	nvEtude TEXT,
	langueRequise TEXT,
	langageRequis TEXT
);

CREATE TABLE Preference (
	idPreference INTEGER PRIMARY KEY,
	secteurPref TEXT,
	typeContratPref TEXT,
	postePref TEXT,
	tyeEntreprisePref TEXT
);

CREATE TABLE CompetenceAcquise (
	idCompetenceAcquise INTEGER PRIMARY KEY,
	nvEtude TEXT,
	langueParlee TEXT,
	langageAcquis TEXT
);













--
