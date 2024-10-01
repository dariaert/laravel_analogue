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
                <div class="login-form">
                    <h1 class="form_title">Вход</h1>

                    <?php if($session->has('error')): ?>
                        <div class="notice error"><?=$session->getFlash('error')?></div>
                    <?php endif; ?>

                    <form action="/login" method="post" class="register_form">
                        <input type="email"
                               id="email"
                               name="email"
                               class="custom-input"
                               placeholder="E-mail"
                        > <br>
                        <input type="password"
                               id="password"
                               name="password"
                               class="custom-input"
                               placeholder="******"
                        > <br>
                        <button
                                type="submit"
                                class="btn"
                        >
                            Войти
                        </button>
                    </form>
                    <div class="register-link">
                        <a href="/register">Зарегистрироваться</a>
                    </div>

                </div>
            </div>
        </div>
    </main>

<?php $view->component('end_custom'); ?>