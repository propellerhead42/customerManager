<?php 
session_start();
    include_once 'include/functions.inc.php';
    include_once 'include/head.inc.php';

    // Gets set at registration
    if(isset($_GET['uCrt'])) {
        successElement('Created users');
    } else if (isset($_GET['fUcrt'])) {
        global $errorMsg;
        errorElement($errorMsg);
    }    
?>
<nav>
    <a href="#">ctomy</a>
</nav>
<main class="flex-container">
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
        <input type="text" name="username" id="username" maxlength="60">
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