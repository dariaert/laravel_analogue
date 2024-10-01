<?php
/**
 * @var \App\Core\View\View $view
 * @var \App\Core\Session\SessionInterface $session
 */
?>

<?php $view->component('start'); ?>

    <main class="main">
        <div class="container">

            <div class="button-panel-list">
                <div class="button-panel-list-item">
                    <a href="/admin/movies/create">
                        <button class="btn-admin-panel">
                            <h4>Фильмы</h4>
                        </button>
                    </a>
                </div>
                <div class="button-panel-list-item">
                    <a href="/admin/shows/create">
                        <button class="btn-admin-panel">
                            <h4>Сеансы</h4>
                        </button>
                    </a>
                </div>
            </div>

            <section class="all-genres" style="margin: 50px 0 50px;">

                <h2>Жанры</h2>
                <?php foreach ($dataAllGenre as $item) { ?>
                    <div class="genre-content-list">
                        <div class="genre-content-list-item">
                            <h3><?= $item['name_genre'] ?></h3>
                        </div>
                        <div class="genre-content-list-item">
                            <div class="panel-icon">
                                <a href="updateGenre.php?id=<?=$item['id']?>">
                                    <img src="/assets/images/Admin/Edit.svg" alt="">
                                </a>
                            </div>
                            <div class="panel-icon">
                                <form action="/content/genre/delete" method="post">
                                    <input type="hidden" name="id" value="<?=$item['id'] ?>">
                                    <button type="submit" class="btn-icon">
                                        <img src="/assets/images/Admin/Delete.svg" alt="">
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </section>

            <section class="redact_genre-film" style="margin-bottom: 50px;">
                <div class="redact_genre-block">
                    <h1>Добавление жанра</h1>
                    <form action="/admin/genres/create" method="post" class="redact-show-form">
                        <input
                                id="name"
                                name="name"
                                type="text"
                                class="redact-input-genre"
                                <?=$session->has('name') ? 'aria-invalid="true"' : ''?>
                                placeholder="Название" >
                        <button class="btn-admin-panel">
                            <div class="admin-panel-text">
                                <div class="panel-icon">
                                    <img src="/assets/images/Admin/Plus.svg" alt="">
                                </div>
                                <h4>Добавить</h4>
                            </div>
                        </button>
                    </form>
                </div>
                <?php if($session->has('name')): ?>
                    <div class="notice error"><?= $session->getFlash('name')[0] ?></div>
                <?php endif; ?>
            </section>


        </div>

    </main>

<?php $view->component('end'); ?>