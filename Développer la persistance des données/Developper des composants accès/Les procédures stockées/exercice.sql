/* ********** Exercice 1 ********** */

/* Créez la procédure stockée Lst_fournis correspondant à la requête n°2 afficher le code des fournisseurs pour lesquels une commande a été passée. */
CREATE PROCEDURE Lst_fournis()
SELECT fournis.numfou FROM fournis JOIN entcom ON entcom.numfou = fournis.numfou

SHOW CREATE PROCEDURE Lst_fournis;



/* ********** Exercice 2 ********** */
/* -- Requète 11 -- Créer la procédure stockée Lst_Commandes, qui liste les commandes ayant un libellé particulier dans le champ obscom (cette requête sera construite à partir de la requête n°11).
SELECT entcom.numcom, nomfou, libart, SUM(qtecde * priuni) AS "sous-total" FROM entcom JOIN fournis ON entcom.numfou = fournis.numfou
JOIN ligcom  on entcom.numcom = ligcom.numcom JOIN produit ON produit.codart = ligcom.codart
WHERE obscom = "Commande urgente" GROUP BY libart
*/
CREATE PROCEDURE Lst_Commandes(In commande Varchar(50))
SELECT entcom.numcom, nomfou, libart, SUM(qtecde * priuni) AS "sous-total" FROM entcom JOIN fournis ON entcom.numfou = fournis.numfou
JOIN ligcom  on entcom.numcom = ligcom.numcom JOIN produit ON produit.codart = ligcom.codart
WHERE obscom = commande GROUP BY libart

CALL Lst_commande("Commande urgente")
Call Lst_commande("Commande cadencée")



/* ********** Exercice 3 ********** */
/* Créer la procédure stockée CA_ Fournisseur, qui pour un code fournisseur et une année entrée en paramètre, 
calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée 
(cette requête sera construite à partir de la requête n°19).*/

CREATE PROCEDURE `CA_Fournisseur`(
    IN `code` VARCHAR(50), 
    IN `annee` VARCHAR(50)
    )

SELECT nomfou, SUM(qtecde * (priuni * 1.20)) AS "CA", DATE_FORMAT(datcom, "%Y") FROM fournis JOIN entcom ON fournis.numfou = entcom.numfou JOIN ligcom ON ligcom.numcom = entcom.numcom WHERE datcom = annee AND entcom.numfou = code GROUP BY nomfou

Call CA_Fournisseur(120, "2018-04-23 15:59:51")