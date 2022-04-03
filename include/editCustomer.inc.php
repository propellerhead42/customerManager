<?php
 
    include_once "../include/functions.inc.php";
    include_once "../auth/home.php";


    global $custId;
    $cust = getCustomerData($custId);

?>

<article id="editForm" class="addCustomerForm">
        <h2>Edit Customer</h2>
        <button id="closeForm2"><i class="fa-solid fa-xmark fa-2x hover-scale"></i></button>
        <form class="flex-column" action="../auth/editCustomer.php?id=<?php echo $custId; ?>" method="POST">
            <input type="text" placeholder="Name" name="name" value=<?php echo $cust['cust_name']; ?> required>
            <input type="text" placeholder="Phone" name="phone" value=<?php echo $cust['cust_phone']; ?> required>
            <input type="number" placeholder="ZipCode" name="zip" value=<?php echo $cust['cust_zip']; ?> required>
            <input type="text" placeholder="City" name="city" value=<?php echo $cust['cust_city']; ?> required>
            <input type="text" placeholder="Street" name="street" value=<?php echo $cust['cust_street']; ?> required>
            <button type="submit" name="editCustomer">Edit Customer</button>
        </form>
</article>