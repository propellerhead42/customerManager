<?php
    if(!isset($_SESSION['users_id'])){
        header('location: ../index.php');
    }
?>

<nav class="flex-col justify-center align-center space-between">
    <div class="nav-header">
        <a href="../auth/home.php">ctomy</a>
        <h3 id="greeting">hi, <?php echo $_SESSION["users_username"] . "<br> id: " . $_SESSION["users_id"] ?></h3>
    </div>
    <div class="nav-item flex-column align-center">
        <a href="#" class="yellow-txt hover-scale"><i class="fa-solid fa-address-book"></i></a>
        <p>view</p>
    </div>
    <div class="nav-item flex-column align-center">
        <a id="addCustomer" href="#" class="yellow-txt hover-scale"><i class="fa-solid fa-plus"></i></a>
        <p>add</p>
    </div>
    <div class="nav-item flex-column align-center">
        <a href="logout.php" class="yellow-txt hover-scale"><i class="fa-solid fa-right-from-bracket"></i></a>
        <p>logout</p>
    </div>
</nav>