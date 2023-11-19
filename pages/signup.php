<?php
    include_once 'header.php';
?>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    section {
        margin: 20px;
        text-align: center; /* Center align the content within the section */
    }

    .container {
        max-width: 400px;
        margin: 0 auto;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input {
        margin-bottom: 10px;
        padding: 8px;
    }

    button {
        padding: 10px;
        background-color: #4caf50;
        color: white;
        border: none;
        cursor: pointer;
    }

    p {
        color: red;
        margin-top: 10px;
    }
</style>
   <section>
    <div class="container">
        <h2>Sign up</h2>
        <form action="inc/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="pwdrepeat" placeholder="Repeat password">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"]== "emptyInput") {
            echo"<p>Fill in all fields</p>";
        }elseif ($_GET["error"]=="invalidUsername") {
            echo"<p>Choose a proper username</p>";
        }elseif ($_GET["error"]=="invalidEmail") {
            echo"<p>Choose a proper email</p>";
        }elseif ($_GET["error"]=="passwordsdontmatch") {
            echo"<p>Password does not match</p>";
        }elseif ($_GET["error"]=="usernameExists") {
            echo"<p>Username taken</p>";
        }elseif ($_GET["error"]=="stmtfailed") {
            echo"<p>Error, something went wrong! </p>";
        }elseif ($_GET["error"]=="success") {
            echo"<p>Successful! </p>";
        }
    }
    ?>
   </section>
<?php
    include_once 'footer.php';
?>