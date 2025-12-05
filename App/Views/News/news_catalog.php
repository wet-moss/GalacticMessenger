<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник | Новости</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
        include './App/Views/Blocks/header.html'; 
    ?>

    <section class="banner">
        <img class="banner__img" src="Images/<?= $lastItems['image'] ?>" alt="Последние новости" loading="lazy"/>
        <div class="banner__content">
            <div class="container container--banner">
                <h2 class="banner__title"><?= $lastItems['title'] ?></h2>
                <h3 class="banner__announce"><?= $lastItems['announce'] ?></h3>
            </div>
        </div>
    </section>

    <main class="news container">
        <h2 class="news__section-title container" id="news">Новости</h2>
        <div class="news__list">
            <?php foreach ($currentItemsList as $news) { ?>
                <a class="news__link" href="index.php?id=<?= $news['id'] ?>&page=<?= $currentPage ?>">
                    <div class="news__card">
                        <time class="news__time" datetime="<?= date('d.m.y', strtotime($news['date'])) ?>">
                            <?= date('d.m.y', strtotime($news['date'])) ?>
                        </time>
                        <h2 class="news__title"><?= $news['title'] ?></h2>
                        <div class="news__announce"><?= $news['announce'] ?></div>
                        <button class="news__button" type="button">
                            Подробнее
                            <svg width="26" height="15" viewBox="0 0 26 15" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.707 8.07106C26.0975 7.68054 26.0975 7.04737 25.707 6.65685L19.343
                                0.292887C18.9525 -0.0976379 18.3193 -0.097638 17.9288 0.292886C17.5383
                                0.683411 17.5383 1.31658 17.9288 1.7071L23.5857 7.36395L17.9288 13.0208C17.5383
                                13.4113 17.5383 14.0445 17.9288 14.435C18.3193 14.8255 18.9525 14.8255 19.343
                                14.435L25.707 8.07106ZM-8.74228e-08 8.36395L24.9999 8.36395L24.9999 6.36395L8.74228e-08
                                6.36395L-8.74228e-08 8.36395Z" fill="currentColor"/>
                            </svg>
                        </button>
                    </div>
                </a>
                <?php } ?>
        </div>

        <div class="pagination">
            <?php 
                if ($currentPage > 1): 
            ?>
                <a class="pagination__link pagination__link-arrow" href="index.php?page=<?= $currentPage - 1 ?>#news">
                    <svg width="24" height="22" viewBox="0 0 24 22" fill="currentColor" transform="rotate(180)"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565
                        11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878
                        3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973
                        17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466
                        11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z"/>
                    </svg>
                </a>
            <?php 
                endif; 
            ?>

            <?php foreach ($paginationPages as $page) { ?>
                <a class="pagination__link <?= ($page == $currentPage) ? 'pagination__link--active' : '' ?>"
                   href="index.php?page=<?= $page ?>#news"><?= $page ?></a>
            <?php } ?>

            <?php 
                if ($currentPage < max($paginationPages)): 
            ?>
                <a class="pagination__link pagination__link-arrow" href="index.php?page=<?= $currentPage + 1 ?>#news">
                    <svg width="24" height="22" viewBox="0 0 24 22" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 10C2.44772 10 2 10.4477 2 11C2 11.5523 2.44772 12 3 12L3 10ZM18.466 11.7071C18.8565
                        11.3166 18.8565 10.6834 18.466 10.2929L12.102 3.92893C11.7115 3.53841 11.0783 3.53841 10.6878
                        3.92893C10.2973 4.31946 10.2973 4.95262 10.6878 5.34315L16.3447 11L10.6878 16.6569C10.2973
                        17.0474 10.2973 17.6805 10.6878 18.0711C11.0783 18.4616 11.7115 18.4616 12.102 18.0711L18.466
                        11.7071ZM3 12L17.7589 12L17.7589 10L3 10L3 12Z"/>
                    </svg>
                </a>
            <?php 
                endif; 
            ?>
        </div>
    </main>

    <?php 
        include './App/Views/Blocks/footer.html'; 
    ?>
</body>
</html>
