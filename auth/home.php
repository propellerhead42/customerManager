<?php 

include_once "../auth/db-connection.php";
include_once "../include/functions.inc.php";

session_start();

if(!isset($_SESSION['users_id'])){
    header('location: ../index.php');
}

$sql = "SELECT  cust_name, cust_phone, cust_zip, cust_city, cust_street, created_at, edited_at, cust_id FROM customers WHERE created_from = :createdId";
$handle = $pdo->prepare($sql);
$params = ['createdId'=>$_SESSION['users_id']];
$handle->execute($params);


?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../src/css/reset.css">
        <link rel="stylesheet" href="../src/css/animations.css">
        <link rel="stylesheet" href="../src/css/main-grid.css">
        <link rel="stylesheet" href="../src/css/styles.css">
        <title>Customer Manager</title>
    </head>
    <body>
        <div class="main-grid">
            <?php include_once '../auth/loggedNav.php' ?>
            <header class="header-grid">
                <div class="header-element header-grid-el">
                    <span class="circle"><?php echo getTotalEntries() ?></span>
                    <h2>total entries</h2>
                </div>
            </header>
            <main class="">
                <h1 class="pad-small">created Customers:</h1>
                <table class="customer-table"> 
                    <tr>
                        <th>Name:</th>
                        <th>Location:</th>
                        <th>Phone:</th>
                        <th>created at:</th>
                        <th>last edit:</th>
                        <th>edit:</th>
                        <th>delete:</th>
                    </tr>
                    <?php 
                        if($handle->rowCount() > 0) {
                            printCustomers();
                        } else {
                            displayEmptyCustomers();
                        }
                    ?>
                </table>
            </main>
        </div>

        <!-- Add customer Form gets viewed by click -->
        <article id="addForm" class="addCustomerForm" hidden="true">
            <h2>Add new Customer</h2>
            <button id="closeForm1">
                <i class="fa-solid fa-xmark fa-2x hover-scale"></i>
            </button>
            <form class="flex-column" action="createCustomer.php" method="POST">
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Phone" name="phone" required>
                <input type="number" placeholder="ZipCode" name="zip" required>
                <input type="text" placeholder="City" name="city" required>
                <input type="text" placeholder="Street" name="street" required>
                <button type="submit" name="addCustomer">Add Customer</button>
            </form>
        </article>

        <?php 
            if(isset($_GET['id'])) {
                $custId = $_GET['id'];
                include_once '../include/editCustomer.inc.php';
            } 
        ?>
        <script src="../src/js/main.js"></script>
    </body>
</html> 