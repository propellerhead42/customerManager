<?php 

include_once "../auth/db-connection.php";
include_once "../include/functions.inc.php";

if(!isset($_SESSION['users_id'])){
    header('location: ../index.php');
}
?>
<!-- Page Start -->
<?php  include_once '../include/head.inc.php' ?>

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
            <?= printCustomers(); ?>
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

<!-- PAGE END -->
<?php include_once '../include/footer.inc.php'; ?>
