SET datestyle TO european;

-- insertion dans CANDIDAT ((attribut))
-- insert into CANDIDAT values("attributs");
insert into utilisateur values(DEFAULT,'adresse-candidat@gmail.com', 'motdepassecandidat', 'paul', 'jean', 23, '06 11 22 33 44', now());
insert into competence values(DEFAULT,'bac+8', 'allemand, anglais', 'java, c, c++, python','1');
insert into renseignement values(DEFAULT,false, 'programmation', 'CDI', 'développeur', 'Corp','1');

insert into candidat values(966, '', '', 1, 'france', 'grenoble', 1, 1);

insert into coach values(968,'');

insert into utilisateur values(DEFAULT,'Candidat2@gmail.com', 'candidat2', 'Jean', 'Paul', 23, '06 11 22 55 44', now());


BEGIN;
    set transaction isolation level Repeatable Read;
    INSERT INTO utilisateur VALUES(1006,'Alt@rrag.com','MDPfff','','',0,'',now());
    INSERT INTO competence values(1005,NULL,NULL,NULL);
    INSERT INTO renseignement values(1005,NULL,NULL,NULL);
    INSERT INTO candidat values(1005,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
COMMIT;