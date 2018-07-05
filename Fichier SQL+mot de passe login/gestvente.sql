
create table client 
(
   idclient            integer          auto_increment not null,
   nom                  char(25)                       not null,
   prenom              char(25)                       null,
   constraint PK_CLIENT primary key (idclient)
);


create table COMMANDE 
(
   idcommande          integer                       not null,
   idclient           integer                        not null,
   numero              char(25)                      not null,
   date               timestamp                      not null,
   constraint PK_COMMANDE primary key (idcommande)
);

create table lignecommande
(
   idligne              integer                        not null,
   idcommande           integer                        not null,
   idproduit            integer                        not null,
   quantite             integer                        not null,
   constraint PK_LIGNECOMMANDE primary key (idligne)
);


create table produit 
(
   idproduit            integer         auto_increment not null,
   libelle              char(25)                       not null,
   prix                 numeric(8,2)                   not null,
   quantite             integer                        not null,
   constraint PK_PRODUIT primary key (idproduit)
);

create table admin
(
    idadmin             integer                 not null,
    utilisateur         varchar(50)             not null,
    motdepasse          varchar(50)             not null
);  

alter table commande
   add constraint FK_COMMANDE_COMMANDER_CLIENT foreign key (idclient)
      references client (idclient)
      on update restrict
      on delete restrict;

alter table lignecommande
   add constraint FK_LIGNECOM_ASSOCIATI_COMMANDE foreign key (idcommande)
      references Ccommande (idcommande)
      on update restrict
      on delete restrict;

alter table lignecommande
   add constraint FK_LIGNECOM_ASSOCIATI_PRODUIT foreign key (idproduit)
      references produit (idproduit)
      on update restrict
      on delete restrict;


insert into client(nom,prenom) values("farid","mohamed");
insert into client(nom,prenom) values("ali","mohamed");
insert into client(nom,prenom) values("hassan","mohamed");
insert into client(nom,prenom) values("cherif","kasse");
insert into client(nom,prenom) values("diop","omar");
insert into client(nom,prenom) values("boubacar","seck");
insert into client(nom,prenom) values("izi","guisse");
insert into client(nom,prenom) values("mahamoud","abdoulaye");
insert into client(nom,prenom) values("pape","mbaye");
insert into client(nom,prenom) values("diakite","amadou");
insert into client(nom,prenom) values("diaw","moktar");
insert into client(nom,prenom) values("diarra","massamba");
insert into client(nom,prenom) values("mboup","demba");
insert into client(nom,prenom) values("ndione","damé");
insert into client(nom,prenom) values("thiaw","falilou");
insert into client(nom,prenom) values("thione","hady");
insert into client(nom,prenom) values("diompy","saliou");
insert into client(nom,prenom) values("diane","aminata");
insert into client(nom,prenom) values("kane","alassane");
insert into client(nom,prenom) values("fall","soukeyna");


insert into admin(idadmin,utilisateur,motdepasse) values(1,"faridmo",sha1("jdk2016"));


INSERT INTO produit(libelle, prix, quantite) VALUES ("banane",700,9);
INSERT INTO produit(libelle, prix, quantite) VALUES ("chemise",5000,25);
INSERT INTO produit(libelle, prix, quantite) VALUES ("chaussette",300,5);
INSERT INTO produit(libelle, prix, quantite) VALUES ("chaussure",20000,10);
INSERT INTO produit(libelle, prix, quantite) VALUES ("lunette",40000,12);
INSERT INTO produit(libelle, prix, quantite) VALUES ("montre",225000,27);
INSERT INTO produit(libelle, prix, quantite) VALUES ("ordinateur portable",500000,30);
INSERT INTO produit(libelle, prix, quantite) VALUES ("table",12000,14);
INSERT INTO produit(libelle, prix, quantite) VALUES ("chapeau",2000,13);
INSERT INTO produit(libelle, prix, quantite) VALUES ("bague",7000,13);


