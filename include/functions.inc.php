<?php

include_once "../auth/db-connection.php";

function displayEmptyCustomers () {
    echo '
        <tr>
            <td>
                <div class="empty-customers">
                    <h3>Quite empty here, go create your first customer!</h3>
                </div>
            </td>
        </tr>
    ';
}

function printCustomers() {
    global $handle;
    while($cust = $handle->fetch(PDO::FETCH_ASSOC)) {
        $created_date = DateTime::createFromFormat('Y-m-d', $cust['created_at']);
        $fmtcreatedDate = $created_date->format('d-m-Y');
        $edited_date = DateTime::createFromFormat('Y-m-d', $cust['edited_at']);
        $fmteditedDate = $edited_date->format('d-m-Y');
        echo' 
            <tr class="customer-table-row">
                <td class="pad-large mobile-stay">'. $cust["cust_name"] . '</td>
                <td>' . $cust['cust_zip'] . ' '. $cust['cust_city'] . ', ' . $cust['cust_street'] . '</td>
                <td>' . $cust['cust_phone'] . '</td>
                <td>' . $fmtcreatedDate . '</td>
                <td>' . $fmteditedDate . '</td>
                <td id="edit-btn" class="text-center mobile-stay">
                    <a href="../auth/home.php?id='. $cust["cust_id"] .'">
                        <i class="fa-solid fa-pencil hover-scale"></i>
                    </a>
                </td>
                <td class="text-center mobile-stay">
                    <a href="../auth/deleteCustomer.php?id='. $cust["cust_id"] .'">
                        <i class="fa-solid fa-trash-can hover-scale"></i>
                    </a>
                </td>
            </tr>
        ';
    }
}

function getTotalEntries() :int {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM customers");
    $totalEntries = $stmt->fetch();
    return $totalEntries[0];
}


function getCustomerData($custId) {
    global $pdo;
    $stmt = $pdo->query("SELECT cust_id, cust_name, cust_zip, cust_city, cust_street, cust_phone FROM customers WHERE cust_id = $custId;");
    $cust = $stmt->fetch();
    return $cust;
}

function getCustomerId($custId) {
    global $pdo;
    $stmt = $pdo->query("SELECT cust_id FROM customers WHERE cust_id = $custId;");
    $cust = $stmt->fetch();
    return $cust;
}