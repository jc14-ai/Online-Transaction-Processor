<?php
include("../../site/backend/dbcon.php");

if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);

    $append_query = "SELECT * FROM (
      SELECT bundles.bundle_name AS product, bundles.bundle_price AS price, order_details.quantity, order_details.order_id 
      FROM order_details 
      LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id 
      WHERE order_details.bundle_id IS NOT NULL 
      UNION ALL 
      SELECT donut.donut_name, donut.donut_price, order_details.quantity, order_details.order_id 
      FROM order_details 
      LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
      WHERE order_details.donut_id IS NOT NULL
      UNION ALL
      SELECT coffee.coffee_name, coffee_price.coffee_price, order_details.quantity, order_details.order_id 
      FROM order_details 
      LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
      LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id AND coffee_price.coffee_size_id = order_details.coffee_size_id 
      WHERE order_details.coffee_id IS NOT NULL
    ) AS all_products WHERE order_id = $order_id;";

    $append_result = mysqli_query($conn, $append_query);
    $items = [];

    while ($row = mysqli_fetch_assoc($append_result)) {
        $items[] = $row;
    }

    $summary_query = "SELECT 
        SUM(price * quantity) AS total_price, 
        SUM(quantity) AS total_quantity 
    FROM (
        SELECT bundles.bundle_price AS price, order_details.quantity, order_details.order_id 
        FROM order_details 
        LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id 
        WHERE order_details.bundle_id IS NOT NULL
        UNION ALL
        SELECT donut.donut_price, order_details.quantity, order_details.order_id 
        FROM order_details 
        LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
        WHERE order_details.donut_id IS NOT NULL 
        UNION ALL
        SELECT coffee_price.coffee_price, order_details.quantity, order_details.order_id 
        FROM order_details 
        LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
        LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id AND coffee_price.coffee_size_id = order_details.coffee_size_id 
        WHERE order_details.coffee_id IS NOT NULL
    ) AS all_products WHERE order_id = $order_id;";

    $summary_result = mysqli_query($conn, $summary_query);
    $summary = mysqli_fetch_assoc($summary_result);

    header('Content-Type: application/json');
    echo json_encode([
        'items' => $items,
        'summary' => $summary
    ]);
}
?>