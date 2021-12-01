SET datestyle TO european;

-- insertion dans CANDIDAT ((attribut))
-- insert into CANDIDAT values("attributs");
insert into utilisateur values(DEFAULT,'adresse-candidat@gmail.com', 'motdepassecandidat', 'shi', 'jean', 23, '06 11 22 33 44', now());
insert into competence values(DEFAULT,'bac+3', 'français, anglais', 'java, c, c++, python');
insert into renseignement values(DEFAULT,false, 'programmation', 'CDI', 'développeur', 'Start-up');

insert into candidat values(428, NULL, NULL, 1, 'france', 'grenoble', 1, 1);


insert into utilisateur values(DEFAULT,'Candidat2@gmail.com', 'candidat2', 'Jean', 'Paul', 23, '06 11 22 55 44', now());