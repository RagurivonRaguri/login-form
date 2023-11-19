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
        <h2>Log in</h2>
        <form action="inc/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Log in</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"]== "emptyInput") {
            echo"<p>Fill in all fields</p>";
        }elseif ($_GET["error"]=="wronglogindetails") {
            echo"<p>Fill in all fields correctly</p>";
        }elseif ($_GET["error"]=="wrongpassword") {
            echo"<p>Wrong password</p>";
        }elseif ($_GET["error"]=="none") {
            echo"<p>Log in successful</p>";
        }
    }
    ?>
    </section>
<?php
    include_once 'footer.php';
?>