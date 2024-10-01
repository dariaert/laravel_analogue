<?php
/**
 * @var \App\Core\View\View $view
 * @var \App\Core\Session\SessionInterface $session
 */
?>

<?php $view->component('start'); ?>

    <main class="main">
        <div class="container">
            <section class="redact_genre-film">
                <div class="redact_genre-block">
                    <h1>Обновление жанра</h1>
                    <form action="/content/genre/redact" method="post" class="redact-show-form">
                        <input type="hidden" name="id" value="">
                        <input id="name" name="name" type="text" class="redact-input-genre" value="" required>
                        <button class="btn-admin-panel" type="submit">
                            <div class="admin-panel-text">
                                <div class="panel-icon">
                                    <img src="/assets/images/Admin/Edit.svg" alt="">
                                </div>
                                <h4>Обновить</h4>
                            </div>
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>

<?php $view->component('end_custom'); ?>