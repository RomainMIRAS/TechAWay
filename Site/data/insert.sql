SET datestyle TO european;

-- insertion dans CANDIDAT ((attribut))
-- insert into CANDIDAT values('attributs');
insert into utilisateur values(DEFAULT,'adresse-candidat@gmail.com', 'motdepassecandidat', 'paul', 'jean', 23, '06 11 22 33 44', now());
insert into competence values(DEFAULT,'bac+8', 'allemand, anglais', 'java, c, c++, python','adresse-candidat@gmail.com');
insert into renseignement values(DEFAULT,false, 'programmation', 'CDI', 'développeur', 'Corp','adresse-candidat@gmail.com');

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


insert into entreprise values(DEFAULT,'Ubisoft','ubisoftFake@ubisoft.com','0721322542','France','Annecy');
insert into competence values(DEFAULT,'bac+3', 'anglais,francais', 'c,c++,python','-2');
insert into renseignement values(DEFAULT,true, 'gaming', 'CDI', 'gamedev,unity,3d', 'Grande','-2');
insert into offre values(DEFAULT,'Game Developer',now(),
                        (select identreprise from entreprise where identreprise = currval('entreprise_identreprise_seq')),
                        (select idcompetence from competence where idcompetence = currval('competence_idcompetence_seq')),
                        (select idrenseignement from renseignement where idrenseignement = currval('renseignement_idrenseignement_seq')));
update competence set link = currval('offre_idoffre_seq')::varchar(30) where link = '-2';
update renseignement set link = currval('offre_idoffre_seq')::varchar(30) where link = '-2';