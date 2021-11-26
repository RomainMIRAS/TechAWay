SET datestyle TO european;

-- insertion dans CANDIDAT ((attribut))
-- insert into CANDIDAT values("attributs");
insert into UTILIISATEUR values(1, 'adresse-candidat@gmail.com', 'motdepassecandidat', 'shi', 'jean', 23, '06 11 22 33 44', now());
insert into COMPETENCE values(1, 'bac+3', 'français, anglais', 'java, c, c++, python');
insert into RENSEIGNEMENT values(1, false, 'programmation', 'CDI', 'développeur', 'Start-up');

insert into CANDIDAT(1, null, null, 1, 'france', 'grenoble', 1, 1);
