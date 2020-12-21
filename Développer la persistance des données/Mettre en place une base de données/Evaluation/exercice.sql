----- // Création de la table Client // -----

Create Table Client (
    cli_num int NOT NULL AUTO_INCREMENT,
    cli_nom varchar(50),
    cli_adresse varchar(50),
    cli_tel varchar(30),
    PRIMARY KEY (cli_num)
);

----- // Création de la table Produit // -----

CREATE TABLE Produit (
    pro_num INT NOT NULL AUTO_INCREMENT,
    pro_libelle VARCHAR(50),
    pro_description VARCHAR(50),
    PRIMARY KEY (pro_num)
);

----- // Création de la table Commande // -----

CREATE TABLE Commande (
    com_num INT NOT NULL AUTO_INCREMENT,
    cli_num int,
    com_date datetime,
    com_obs varchar(50),
    PRIMARY KEY (com_num),
    FOREIGN KEY (cli_num) REFERENCES Client (cli_num)
);

----- // Création de la table est_composé // -----

CREATE TABLE Est_compose (
    com_num INT,
    pro_num INT,
    est_qte INT,
    PRIMARY KEY (com_num, pro_num),
    FOREIGN KEY (com_num) REFERENCES Commande (com_num),
    FOREIGN KEY (pro_num) REFERENCES Produit (pro_num)
);