<?php

// output of a html tr element, when query to select customers is < 0
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

// gets displayed when something was succesfull, has animation class, fades out after 2 seconds
function successElement($msg) {
    echo '
    <div class="success-overlay scale-out-center">
        <h3 class="success">
            ' . $msg . ' <i class="fa-solid fa-check"></i>
        </h3>
    </div> 
    ';
}

function errorElement($msg) {
    echo '
    <div class="success-overlay scale-out-center">
        <h3 class="error">
            ' . $msg . ' <i class="fas fa-exclamation"></i>
        </h3>
    </div> 
    ';
}

function printCustomers() {
    global $pdo;
    $sql = "SELECT  cust_name, cust_phone, cust_zip, cust_city, cust_street, created_at, edited_at, cust_id FROM customers WHERE created_from = :createdId";
    $handle = $pdo->prepare($sql);
    $params = ['createdId'=>$_SESSION['users_id']];
    $handle->execute($params);
    if($handle->rowCount() > 0){
        $isEmptyCustomers = false;
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
    } else {
        $isEmptyCustomers = true;
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