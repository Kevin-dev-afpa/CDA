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
    Possibilité de restreindre l'accès des produits au client dès la connexion avec l'aide de la session, 
cela serait une première partie mise en place pour permettre la restriction des coûts.

    Pour tenir compte des coûts liés au transport vis à vis d'une commande d'un produit, je pense notamment au déclencheur.
Il se déclencherait après qu'une commande soit insérer dans 'Orders',
il vérifierait que tel produit commandé d'un fournisseur, soit égal au pays du client. 
*/