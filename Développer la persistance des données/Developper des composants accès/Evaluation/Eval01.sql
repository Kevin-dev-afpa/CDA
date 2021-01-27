-- *************************************** 1) Requêtes d'intérrogation sur la base NorthWind ****************************

-- 1 - Liste des contacts français : --
select CompanyName as Société, ContactName as contact, ContactTitle as Fonction, Phone as Téléphone
from customers
where Country = "France"

-- 2 - Produits vendus par le fournisseur « Exotic Liquids » : --
select ProductName as Produit, UnitPrice as Prix
from products
join suppliers on products.SupplierID = suppliers.SupplierID
where CompanyName = "Exotic Liquids"

-- 3 - Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant : --
select CompanyName as Fournisseur, count(distinct ProductName) as Nbre_produits
from products
join suppliers on products.SupplierID = suppliers.SupplierID
where suppliers.Country = "France"
group by CompanyName
order by Nbre_produits desc

-- 4 - Liste des clients Français ayant plus de 10 commandes : --
select distinct CompanyName as Client, count(orders.CustomerID) as Nbre_commandes
from customers
join orders on customers.CustomerID = orders.CustomerID
where Country = "France"
group by CompanyName
having Nbre_commandes > 10

-- 5 - Liste des clients ayant un chiffre d’affaires > 30.000 : --
SELECT CompanyName as Client, SUM(quantity * UnitPrice) AS CA, Country as Pays
FROM orders
join order_details on order_details.OrderID = orders.OrderID
join customers on customers.CustomerID = orders.CustomerID
group by customers.CustomerID
having CA > 30000
order by CA desc 

-- 6 – Liste des pays dont les clients ont passé commande de produits fournis par « Exotic Liquids » : --
select distinct customers.Country as Pays
FROM suppliers
join products on suppliers.SupplierID = products.SupplierID
join order_details on products.ProductID = order_details.ProductID
join orders on order_details.OrderID = orders.OrderID
join customers on  orders.CustomerID = customers.CustomerID
WHERE suppliers.CompanyName ="Exotic Liquids"
ORDER BY customers.Country

-- 7 – Montant des ventes de 1997 : --
select sum(quantity * Unitprice) AS 'Montant Vente 97'
from order_details
join orders on order_details.OrderID = orders.OrderID
WHERE OrderDate BETWEEN '1997-01-01 00:00:00' AND '1997-12-31 00:00:00'

-- 8 – Montant des ventes de 1997 mois par mois : --
select distinct MONTH(OrderDate) AS 'Mois 97', SUM(Quantity * UnitPrice) AS 'Montant vente' 
FROM order_details
JOIN orders ON order_details.OrderID = orders.OrderID
WHERE OrderDate BETWEEN '1997-01-01 00:00:00' AND '1997-12-31 00:00:00'
GROUP BY MONTH(OrderDate)

-- 9 – Depuis quelle date le client « Du monde entier » n’a plus commandé ? --
select OrderDate AS "Date de la dernière commande"
from orders
join customers on orders.CustomerID = customers.CustomerID
where CompanyName = "Du monde entier"
ORDER BY OrderDate DESC
LIMIT 1

-- 10 – Quel est le délai moyen de livraison en jours ? --
SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS "Délai moyen de livraison"
FROM orders

-- *************************************** 2) Procédures stockées ****************************

-- 9 – Depuis quelle date le client « Du monde entier » n’a plus commandé ? --
CREATE PROCEDURE derniereDate(IN client VARCHAR(50))

select OrderDate AS "Date de la dernière commande"
from orders
join customers on orders.CustomerID = customers.CustomerID
where CompanyName = client
ORDER BY OrderDate DESC
LIMIT 1

CALL derniereDate('Around the Horn') -- On peut remplacer par n'importe quel nom d'entreprise

-- 10 – Quel est le délai moyen de livraison en jours ? --
CREATE PROCEDURE delaiMoyen()

SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS "Délai moyen de livraison"
FROM orders

CALL delaiMoyen

-- *************************************** 3) Mise en place d'une règle de gestion ****************************
/*

Pour tenir compte des coûts liés au transport, on vérifiera que pour chaque produit d’une commande, 
le client réside dans le même pays que le fournisseur du même produit

*/

CREATE TRIGGER commande_pays BEFORE INSERT ON
    order_details 
    FOR EACH ROW
    
BEGIN
    DECLARE id_com INT; 
    DECLARE id_ord INT; 
    DECLARE paysProduit VARCHAR(20); 
    DECLARE paysLivraison VARCHAR(20);

    SET id_ord = NEW.OrderID;
    SET id_com = NEW.ProductID; -- Je capte la nouvelle entrée et je le stock

    -- Ici est stocké le pays d'origine du produit du vendeur
    SET paysProduit =(SELECT suppliers.Country FROM suppliers
        JOIN products ON products.SupplierID = suppliers.SupplierID
        WHERE ProductID = id_com);

    -- Ici est stocké le pays d'origine de la destination du produit 
    SET paysLivraison =(SELECT orders.ShipCountry FROM orders
    JOIN order_details ON orders.OrderID = order_details.OrderID
    JOIN products ON order_details.ProductID = products.ProductID
    WHERE order_details.ProductID = id_com AND orders.OrderID = id_ord);

-- Maintenant on met en place la condition
    IF paysProduit NOT LIKE paysLivraison THEN SIGNAL SQLSTATE '40000'
    SET MESSAGE_TEXT = "Nous ne pouvons livrer ce produit dû au changement de pays";
    END IF;
END;