<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник | Новость</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <?php 
        include './App/Views/Blocks/header.html'; 
    ?>

    <main class="news-article container">
        <nav class="news-article__breadcrumbs">
            <a href="index.php?page=<?= $page ?>">Главная</a>
            <span>/</span>
            <span class="news-article__breadcrumbs--current"><?= $article['title'] ?></span>
        </nav>

        <h2 class="news-article__title"><?= $article['title'] ?></h2>
        <div class="news-article__full">
            <div class="news-article__info">
                <time class="news-article__time" datetime="<?= date('d.m.y', strtotime($article['date'])) ?>">
                    <?= date('d.m.y', strtotime($article['date'])) ?>
                </time>
                <h2 class="news-article__announce"><?= $article['announce'] ?></h2>
                <div class="news-article__content"><?= $article['content'] ?></div>
                <a class="news-article__back-link" href="index.php?page=<?= $page ?>#news">
                    <svg width="26" height="15" viewBox="0 0 26 15" transform="rotate(180)"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.707 8.07106C26.0975 7.68054 26.0975 7.04737 25.707 6.65685L19.343
                                0.292887C18.9525 -0.0976379 18.3193 -0.097638 17.9288 0.292886C17.5383
                                0.683411 17.5383 1.31658 17.9288 1.7071L23.5857 7.36395L17.9288 13.0208C17.5383
                                13.4113 17.5383 14.0445 17.9288 14.435C18.3193 14.8255 18.9525 14.8255 19.343
                                14.435L25.707 8.07106ZM-8.74228e-08 8.36395L24.9999 8.36395L24.9999 6.36395L8.74228e-08
                                6.36395L-8.74228e-08 8.36395Z" fill="currentColor" />
                    </svg>
                    Назад к новостям
                </a>
            </div>
            <img class="news-article__img" src="./Images/<?= $article['image'] ?>" alt="Иллюстрация к новости"
                 width="740" height="570" loading="lazy"/>
        </div>
    </main>

    <?php 
        include './App/Views/Blocks/footer.html'; 
    ?>
</body>
</html>
