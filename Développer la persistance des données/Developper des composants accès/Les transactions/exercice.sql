/* ********** Exercice 1 ********** */

START TRANSACTION;

SELECT nomfou FROM fournis WHERE numfou=120;

UPDATE fournis  SET nomfou= 'GROSBRIGAND' WHERE numfou=120 

SELECT nomfou FROM fournis WHERE numfou=120

/*
Sans commit l'enregistrement n'est pas effective dans la base de donnée
*/

/*
Non tant que la transaction n'est pas validé on ne peut modifier les valeurs
*/

/*
Non
*/

/*
Il suffit d'effectuer un COMMIT
*/

/*
En utilisant le ROLLBACK
*/
