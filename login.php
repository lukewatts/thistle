<?php require_once('templates/header.php'); ?>

<?php
    <section>
        <h1>Thistle Login</h1>

        <form action="" method="post">
            <div>
                <?php if (isset($error)) echo $error; ?>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email"/>
            </div>
            <div>
                <input type="hidden" name="token" value="<?php echo Token::make(); ?>">
                <input type="submit" value="Login">
            </div>
        </form>
    </section>

<?php require_once($path['base'] . '/templates/footer.php'); ?>