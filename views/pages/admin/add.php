<?php
/**
 * @var \App\Core\View\View $view
 * @var \App\Core\Session\Session $session
 */
?>

<?php $view->component('start') ?>

    <h1>ADD PAGE</h1>

    <form action="/admin/add" method="post" enctype="multipart/form-data">
        <p>Name</p>
        <div>
            <input type="text" name="name">
        </div>
        <?php if($session->has('name')) { ?>
            <ul>
                <?php foreach ($session->getFlash('name') as $error) { ?>
                    <li style="color: red"><?=$error?></li>
                <?php } ?>
            </ul>
        <?php } ?>
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <button>Add</button>
        </div>
    </form>

<?php $view->component('end') ?>