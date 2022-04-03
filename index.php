<?php 
    include 'include/head.inc.php';
    include 'include/functions.inc.php';
?>

<nav>
    <a href="#">ctomy</a>
</nav>
<main class="flex-container">
    <?php 
        if(isset($_GET['reg'])) {
            echo successElement("Successfully registrated");
        } 
    ?>
    <header>
        <h1>Manage your customers</h1>
        <h2>easy</h2>
        <h2>everywhere</h2>
    </header>
    <section class="form-container login-form">
        <form id='login' class="flex-column" action="auth/login.php" method="POST">
            <h3>Sign in now and start managing your customers</h3>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Sign In</button>
        </form>
        <a class="register-link" href="#registerForm">Create new Account</a>
    </section> 
</main>
<section id="registerForm" class="form-container register-form">
    <h3>Create an Account</h3>
    <form class="flex-column" action="auth/register.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" maxlength="60" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" minlength="8" required>
        <label for="repPwd">Repeat Password</label>
        <input type="password" name="repPwd" id="repPwd" minlength="8" required>
        <button class="margin-top-1" type="submit" name="register">Create</button>
    </form>
</section>
</body>
</html> 