-----------------------------------------------//* Première partie *//-------------------------------------------------------------

-- // 1. Afficher toutes les informations concernant les employés. //
Select * From employe

-- // 2. Afficher toutes les informations concernant les départements. //
Select * From dept

-- // 3. Afficher le nom, la date d'embauche, le numéro du supérieur, le numéro de département et le salaire de tous les employés. //
Select nom, dateemb, nosup, nodep, salaire From employe
SELECT nom AS "Nom de l'employé", dateemb AS "date d'embauche de l'employé", nosup AS "Numéro du supérieur de l'employé", nodep AS "Numéro du département de l'employé", salaire AS "Salaire de l'employé" FROM employe

-- // 4. Afficher le titre de tous les employés. //
Select nom, titre From employe

-- // 5. Afficher les différentes valeurs des titres des employés. //
Select Distinct titre From employe

-- // 6. Afficher le nom, le numéro d'employé et le numéro du département des employés dont le titre est « Secrétaire ». //
Select nom, noemp, nodep  From employe WHERE (titre="secrétaire")

-- // 7. Afficher le nom et le numéro de département dont le numéro de département est supérieur à 40. //
Select nom, nodep From employe WHERE (nodep > 40)

-- // 8. Afficher le nom et le prénom des employés dont le nom est alphabétiquement antérieur au prénom. //
Select nom, prenom From employe WHERE (nom < prenom)

/* 9. Afficher le nom, le salaire et le numéro du département des employés
dont le titre est « Représentant », le numéro de département est 35 et
le salaire est supérieur à 20000. */
Select nom, salaire, nodep from employe WHERE (titre= "Représentant" AND nodep=35 AND salaire > 20000)

-- // 10.Afficher le nom, le titre et le salaire des employés dont le titre est « Représentant » ou dont le titre est « Président ». //
Select nom, titre, salaire From employe WHERE (titre="Représentant" OR titre="Président")

/* 11.Afficher le nom, le titre, le numéro de département, le salaire des
employés du département 34, dont le titre est « Représentant » ou
« Secrétaire ». */ 
Select nom, titre, nodep, salaire From employe WHERE ((nodep=34 AND titre="Représentant") OR titre="Secrétaire")

/* 12.Afficher le nom, le titre, le numéro de département, le salaire des
employés dont le titre est Représentant, ou dont le titre est Secrétaire
dans le département numéro 34.  */
Select nom, titre, nodep, salaire From employe WHERE (titre="Représentant" OR (titre="Secrétaire" AND nodep=34))

-- // 13.Afficher le nom, et le salaire des employés dont le salaire est compris entre 20000 et 30000. //
Select nom, salaire From employe WHERE salaire BETWEEN 20000 AND 30000

-- // 15.Afficher le nom des employés commençant par la lettre « H ». //
Select nom From employe WHERE nom LIKE 'h%'

-- // 16.Afficher le nom des employés se terminant par la lettre « n ». //
Select nom From employe WHERE nom Like '%n'

-- // 17.Afficher le nom des employés contenant la lettre « u » en 3ème position. //
Select nom From employe Where nom Like '__u%'

-- // 18.Afficher le salaire et le nom des employés du service 41 classés par salaire croissant. //
Select nom, salaire From employe WHERE nodep = 41 ORDER BY salaire

-- // 19.Afficher le salaire et le nom des employés du service 41 classés par salaire décroissant. //
Select nom, salaire From employe WHERE nodep = 41 ORDER BY salaire DESC

-- // 20.Afficher le titre, le salaire et le nom des employés classés par titre croissant et par salaire décroissant. //
Select nom, titre, salaire From employe ORDER BY titre , salaire DESC

-- // 21.Afficher le taux de commission, le salaire et le nom des employés classés par taux de commission croissante. //
Select nom, salaire, tauxcom From employe ORDER BY tauxcom

-- // 22.Afficher le nom, le salaire, le taux de commission et le titre des employés dont le taux de commission n'est pas renseigné. //
Select nom, salaire, tauxcom, titre From employe WHERE tauxcom IS NULL

-- // 23.Afficher le nom, le salaire, le taux de commission et le titre des employés dont le taux de commission est renseigné. //
Select nom, salaire, tauxcom, titre From employe WHERE tauxcom IS NOT NULL

-- // 24.Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est inférieur à 15. //
Select nom, salaire, tauxcom, titre From employe WHERE tauxcom < 15

-- // 25. Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est supérieur à 15. //
Select nom, salaire, tauxcom, titre From employe WHERE tauxcom > 15

/* 26.Afficher le nom, le salaire, le taux de commission et la commission des
employés dont le taux de commission n'est pas nul. (la commission
est calculée en multipliant le salaire par le taux de commission) */
Select nom, salaire, tauxcom, (tauxcom * salaire) AS "commission des employés" From employe Where tauxcom IS NOT NULL

/* 27. Afficher le nom, le salaire, le taux de commission, la commission des
employés dont le taux de commission n'est pas nul, classé par taux de
commission croissant.  */
Select nom, salaire, tauxcom, (tauxcom * salaire) AS "commission des employés" From employe Where tauxcom IS NOT NULL ORDER BY (tauxcom * salaire) ASC

-- // 28. Afficher le nom et le prénom (concaténés) des employés. Renommer les colonnes //
Select CONCAT(nom, prenom) AS "Employé" From employe

-- // 29. Afficher les 5 premières lettres du nom des employés. //
Select substring(nom, 1, 5) From employe

-- // 30. Afficher le nom et le rang de la lettre « r » dans le nom des employés. //
Select nom Locate('r', nom) From employe

-- // 31. Afficher le nom, le nom en majuscule et le nom en minuscule de l'employé dont le nom est Vrante. //
Select nom, UPPER(nom) AS "NOM", LOWER(nom) AS "nom(minuscule)" From employe Where nom="Vrante"

-- // 32. Afficher le nom et le nombre de caractères du nom des employés. //
Select nom, Length(nom) From employe

-----------------------------------------------//* Jointure *//-------------------------------------------------------------


/* Rechercher le prénom des employés et le numéro de la région de leur
département.  */
Select prenom, noregion From employe Join dept On employe.nodep = dept.nodept

/* Rechercher le numéro du département, le nom du département, le
nom des employés classés par numéro de département (renommer les
tables utilisées). */ 
Select nodept, dept.nom AS "nom du département", employe.nom AS "nom des employés" From dept Join employe On employe.nodep = dept.nodept

/* Rechercher le nom des employés du département Distribution.  */
Select employe.nom From employe Join dept On employe.nodep = dept.nodept Where dept.nom = "Distribution"

/* Rechercher le nom et le salaire des employés qui gagnent plus que
leur patron, et le nom et le salaire de leur patron.  */
Select employe.nom, employe.salaire From employe Join employe On 