SET datestyle TO european;

-- insertion dans CANDIDAT ((attribut))
-- insert into CANDIDAT values("attributs");
insert into utilisateur values(1,'adresse-candidat@gmail.com', 'motdepassecandidat', 'shi', 'jean', 23, '06 11 22 33 44', now());
insert into competence values(1,'bac+3', 'français, anglais', 'java, c, c++, python');
insert into renseignement values(1,false, 'programmation', 'CDI', 'développeur', 'Start-up');

insert into candidat(1, null, null, 1, 'france', 'grenoble', 1, 1);
