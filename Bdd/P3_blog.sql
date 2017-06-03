drop table if exists T_CHAPITRE;
drop table if exists T_COMMENTAIRE;
drop table if exists T_UTILISATEUR;



CREATE TABLE T_CHAPITRE (
 CHAP_ID INTEGER primary key auto_increment,
 CHAP_numero INTEGER not null,
 CHAP_titre VARCHAR(100) not null,
 CHAP_date datetime NOT NULL default CURRENT_TIMESTAMP,
 CHAP_publication INTEGER not null default '0',
 CHAP_nbcom INTEGER NOT NULL DEFAULT '0')
 ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE T_COMMENTAIRE (
 COM_ID INTEGER primary key auto_increment,
 COM_auteur VARCHAR(100) NOT NULL,
 COM_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 COM_contenu INTEGER NOT NULL DEFAULT '0',
 COM_signalement INTEGER NOT NULL DEFAULT '0',
 CHAP_ID INTEGER NOT NULL,
 CONSTRAINT fk_com_chap foreign key(CHAP_ID) references T_CHAPITRE(CHAP_ID))
 ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE T_UTILISATEUR (
 UTIL_ID INTEGER primary key auto_increment,
 UTIL_nom VARCHAR(100) NOT NULL,
 UTIL_mdp varchar(100) NOT NULL )
 ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

