<?php
// Sample test data
$order_details = array(
    array('id' => 1, 'user_id' => 1, 'order_id' => 101, 'product_id' => 1, 'quantity' => 5),
    array('id' => 2, 'user_id' => 1, 'order_id' => 101, 'product_id' => 2, 'quantity' => 3),
    array('id' => 3, 'user_id' => 1, 'order_id' => 101, 'product_id' => 3, 'quantity' => 2),
    array('id' => 4, 'user_id' => 1, 'order_id' => 102, 'product_id' => 4, 'quantity' => 1),
    array('id' => 5, 'user_id' => 1, 'order_id' => 102, 'product_id' => 5, 'quantity' => 4),
    array('id' => 6, 'user_id' => 2, 'order_id' => 103, 'product_id' => 6, 'quantity' => 2),
    array('id' => 7, 'user_id' => 2, 'order_id' => 104, 'product_id' => 7, 'quantity' => 3),
    array('id' => 8, 'user_id' => 2, 'order_id' => 104, 'product_id' => 8, 'quantity' => 2),
    array('id' => 9, 'user_id' => 2, 'order_id' => 104, 'product_id' => 9, 'quantity' => 12),
);

// Group the order details by user_id and order_id
$grouped_order_details = array();
foreach ($order_details as $row) {
    $grouped_order_details[$row['user_id']][$row['order_id']][] = $row;
}

// Prepare data for DataTables
$data = array();
foreach ($grouped_order_details as $user_id => $user_orders) {
    foreach ($user_orders as $order_id => $order_items) {
        $first_row = true;
        $rowspan = count($order_items);
        foreach ($order_items as $index => $item) {
            $data[] = array(
                'user_id' => $first_row ? $user_id : '',
                'order_id' => $first_row ? $order_id : '',
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity']
            );
            $first_row = false;
        }
    }
}

// Output JSON data
echo json_encode(array('data' => $data));
?>