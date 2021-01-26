/* ********** Phase 1 ********** */

-- ------ Exercice ------ --

-- 1. modif_reservation : interdire la modification des réservations (on autorise l'ajout et la suppression). --
CREATE TRIGGER modif_reservation AFTER UPDATE ON reservation
FOR EACH ROW

SIGNAL SQLSTATE'007' SET MESSAGE_TEXT = 'Impossible de modifier une réservation'

-- 2. insert_reservation : interdire l'ajout de réservation pour les hôtels possédant déjà 10 réservations. --
CREATE TRIGGER `insert_reservation` AFTER INSERT ON `reservation` 
FOR EACH ROW 
BEGIN 
DECLARE nb_reservation INT; 
SET nb_reservation = NEW.res_cha_id; 
IF count(nb_reservation)>10 THEN 
SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = "Impossible d'ajouter une nouvelle réservation !"; 
END IF; 
END

-- 3. insert_reservation2 : interdire les réservations si le client possède déjà 3 réservations --
CREATE TRIGGER `insert_reservation2` AFTER INSERT ON `reservation` 
FOR EACH ROW 
BEGIN 
DECLARE nb_reservation_client INT; 
SET nb_reservation_client = NEW.res_cli_id; 
IF count(nb_reservation)>3 THEN 
SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = "Impossible d'ajouter une nouvelle réservation !, Le client possède déjà 3 réservation"; 
END IF; 
END

-- 4. insert_chambre : lors d'une insertion, on calcule le total des capacités des chambres pour l'hôtel, si ce total est supérieur à 50, on interdit l'insertion de la chambre. --
CREATE TRIGGER `insert_chambre` AFTER INSERT ON `chambre` 
FOR EACH ROW 
BEGIN 
DECLARE cha_capacite_hotel INT; 
SET cha_capacite_hotel = NEW.cha_capacite; 
IF SUM(cha_capacite_hotel)>50 THEN 
SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = "La capacité d'acceuil de l'hôtel ne peut pas être supérieur à 50 !"; 
END IF; 
END


-- ------ Cas pratique ------ --
-- 1. 
CREATE TRIGGER maj_total AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stocke le total dans la table commande
END;

-- 2. Modification
CREATE TRIGGER maj_total_modif AFTER UPDATE ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stocke le total dans la table commande
END;

-- Suppression
CREATE TRIGGER maj_total_delete AFTER DELETE ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = OLD.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stocke le total dans la table commande
END;

-- 3. 
CREATE TRIGGER maj_total_remise AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
        DECLARE id_c INT;
        DECLARE tot DOUBLE;
        SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
        SET tot = (SELECT sum(prix*quantite)-remise FROM lignedecommande JOIN commande ON lignedecommande.id_commande = commande.id WHERE id_commande=id_c); -- on recalcul le total
        UPDATE commande SET total=tot WHERE id=id_c; -- on stocke le total dans la table commande
END;


/* ********** Phase 2 ********** */

CREATE TRIGGER commande_stock AFTER UPDATE ON produit
    FOR EACH ROW
    BEGIN
        DECLARE id_codart VARCHAR(4);
        DECLARE qtestck INT;
        SET qtestck = OLD.stkale - NEW.stkphy;
        SET id_codart = OLD.codart; -- Ici on stock notre variable de commande du produit
        If qtestck > 0 THEN 
        INSERT INTO articles_a_commander(CODART, QTE)
        VALUES(id_codart,  qtestck - QTE);
        END IF;
END;