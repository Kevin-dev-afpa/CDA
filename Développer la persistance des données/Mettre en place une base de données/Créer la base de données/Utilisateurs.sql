----------------------------- // Création des utilisateurs // ------------------------------------

CREATE USER 'util1'@'%' IDENTIFIED BY 'azerty';
CREATE USER 'util2'@'%' IDENTIFIED BY 'azerty';
CREATE USER 'util3'@'%' IDENTIFIED BY 'azerty';

----------------------------- // Gestion des droits // ------------------------------------
    ---------- Util 1 --------
GRANT ALL PRIVILEGES ON papyrus.* TO 'util1';

    ---------- Util 2 --------
GRANT SELECT ON papyrus.* TO 'util2';

    ---------- Util 3 --------
GRANT SELECT ON papyrus.Fournis TO 'util3';