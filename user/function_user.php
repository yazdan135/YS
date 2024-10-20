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
    // Initialize base SQL query to select product data
    $sql = "SELECT product.*, category.category, product.paking 
            FROM product 
            JOIN category ON product.category_id = category.id 
            WHERE 1"; // '1' ensures no SQL error in case no conditions are added.

    // Add conditions based on the function arguments
    if ($status === 1) {
        $sql .= " AND product.status = 1"; // Only fetch products with status 1 if required
    }
    if ($cat_id != '') {
        $sql .= " AND product.category_id = $cat_id"; // Filter by category if specified
    }
    if ($product_id != '') {
        $sql .= " AND product.id = $product_id"; // Filter by product id if specified
    }
    if ($type == 'latest') {
        $sql .= " ORDER BY product.id DESC"; // Order by latest if type is 'latest'
    }

    // Add limit if specified
    if ($limit != '') {
        $sql .= " LIMIT $limit";
    }

    // Execute the query and handle errors
    $res = mysqli_query($con, $sql);
    if (!$res) {
        die("Database query failed: " . mysqli_error($con)); // Debugging help
    }

    $data = []; // Initialize an empty array to hold the results

    // Fetch all rows returned by the query
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data; // Return the fetched data array
}
