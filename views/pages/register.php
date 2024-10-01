<?php
/**
 * @var \App\Core\View\View $view
 * @var \App\Core\Session\SessionInterface $session
 */
?>

<?php $view->component('start_custom'); ?>

    <main class="main">
        <div class="container">
            <div class="form-centre">
                <div class="register-form">
                    <h1 class="form_title">Регистрация</h1>
                    <form action="/register" method="post" class="register_form">
                        <input
                                type="text"
                                id="name"
                                name="name"
                                class="custom-input"
                                <?=$session->has('name') ? 'aria-invalid="true"' : ''?>
                                placeholder="Имя"
                        ><br>
                        <?php if($session->has('name')): ?>
                            <div class="notice error"><?= $session->getFlash('name')[0] ?></div>
                        <?php endif; ?>
                        <input
                                type="email"
                                id="email"
                                name="email"
                                class="custom-input"
                                <?=$session->has('email') ? 'aria-invalid="true"' : ''?>
                                placeholder="E-mail"
                        ><br>
                        <?php if($session->has('email')): ?>
                            <div class="notice error"><?= $session->getFlash('email')[0] ?></div>
                        <?php endif; ?>
                        <input
                                type="password"
                                id="password"
                                name="password"
                                class="custom-input"
                                <?=$session->has('password') ? 'aria-invalid="true"' : ''?>
                                placeholder="Пароль"
                        ><br>
                        <?php if($session->has('password')): ?>
                            <div class="notice error"><?= $session->getFlash('password')[0] ?></div>
                        <?php endif; ?>
                        <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="custom-input"
                                placeholder="Подтверждение пароля"
                        ><br>
                        <button type="submit" class="btn">Создать аккаунт</button>
                    </form>

                </div>
            </div>
        </div>
    </main>

<?php $view->component('end_custom'); ?>