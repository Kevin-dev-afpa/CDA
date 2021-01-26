/* ********** Exercice 1 ********** */

-- 1. Afficher la liste des hôtels avec leur station --
CREATE VIEW v_liste_hotel_avec_station
AS
SELECT sta_nom, hot_nom  FROM hotel JOIN station ON hot_sta_id = sta_id 

-- 2. Afficher la liste des chambres et leur hôtel --
CREATE VIEW v_numero_chambre_avec_hotel
AS
SELECT cha_numero, hot_nom FROM hotel JOIN chambre ON cha_hot_id = hot_id

-- 3. Afficher la liste des réservations avec le nom des clients --
CREATE VIEW v_num_resa_avec_client
AS
SELECT res_id, cli_nom FROM reservation JOIN client ON res_cli_id = cli_id

-- 4. Afficher la liste des chambres avec le nom de l’hôtel et le nom de la station --
CREATE VIEW v_liste_chambre_avec_nom_hotel_et_nom_station
AS
SELECT cha_numero, hot_nom, sta_nom FROM chambre JOIN hotel ON cha_hot_id = hot_id JOIN station ON hot_sta_id = sta_id

-- 5. Afficher les réservations avec le nom du client et le nom de l’hôtel --
CREATE VIEW v_res_avec_nom_client_et_nom_hotel
AS
SELECT res_date, cli_nom, hot_nom FROM client JOIN reservation ON cli_id = res_cli_id JOIN chambre ON res_cha_id = cha_id JOIN hotel ON cha_hot_id = hot_id