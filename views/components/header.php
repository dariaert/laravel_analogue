<?php
/**
 * @var \App\Core\Auth\AuthInterface $auth
 */
$user = $auth->user();
?>
<header>
    <?php if ($auth->check()) { ?>
        <h3>User: <?=$user->email()?></h3>
        <form action="/logout" method="post">
            <button>Logout</button>
        </form>
        <hr>
    <?php } ?>
</header>