<?php

function pr($arr)
{
    echo '<pre>';
    print_r($arr);
}

function prx($arr)
{
    echo '<pre>';
    print_r($arr);
    die();
}

function get_product($con, $type = '', $limit = '', $status = null, $cat_id = '', $product_id = '')
{
    $sql = "SELECT product.*, category.category, product.paking FROM product 
            JOIN category ON product.category_id = category.id 
            WHERE product.status = 1"; // Start with a basic query

    if ($status === 1) {
        $sql .= " AND product.status = 1"; // Add the status condition only if status is 1
    }
    if ($cat_id != '') {
        $sql .= " AND product.category_id = $cat_id"; // Add category id condition only if category id is provided
    }
    if ($product_id != '') {
        $sql .= " AND product.id = $product_id"; // Add product id condition only if product id is provided
    }
    if ($type == 'latest') {
        $sql .= " ORDER BY product.id DESC"; // Sort by ID if type is latest
    }

    if ($limit != '') {
        $sql .= " LIMIT $limit"; // Add limit if specified
    }

    $res = mysqli_query($con, $sql);
    if (!$res) {
        die("Database query failed: " . mysqli_error($con)); // Error handling
    }

    $data = []; // Initialize data array

    while ($row = mysqli_fetch_array($res)) {
        $data[] = $row; // Collect results
    }

    return $data; // Return collected results
}

?>