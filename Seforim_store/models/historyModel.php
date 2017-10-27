<?php

$query = "SELECT c.first_name, s.name, UNIX_TIMESTAMP(o.order_date) AS date
FROM customers c 
JOIN orders o ON c.id = o.customer_id
JOIN order_details od ON od.order_id = o.order_id
JOIN seforim s ON od.product_id = s.id
WHERE c.id = :id";
$statement = $con -> prepare($query);
$statement->bindValue('id', $id);
$statement->execute();
$results = $statement->fetchall(PDO::FETCH_ASSOC);
?>