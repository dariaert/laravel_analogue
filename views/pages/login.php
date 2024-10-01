<?php
/**
 * @var \App\Core\View\ViewInterface $view
 * @var \App\Core\Session\SessionInterface $session
 */
?>

<?php $view->component('start') ?>


    <h1>LOGIN PAGE</h1>

    <form action="/login" method="post">

        <?php if($session->has('error')) { ?>
            <p style="color: red">
                <?= $session->getFlash('error') ?>
            </p>
        <?php } ?>

        <p>email</p>
        <input type="text" name="email">
        <p>password</p>
        <input type="password" name="password">
        <button>Login</button>
    </form>

<?php $view->component('end') ?>