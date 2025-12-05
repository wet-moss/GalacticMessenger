<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Галактический вестник | Главная</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php 
        include './App/Views/Blocks/header.html'; 
    ?>

    <div class="container">
        <h1 class='news__section-title'>Главная</h1>

        <br>

        <h2 class='pagination__link'>
            <a href="index.php?page=1">
            К новостям
                <svg width="26" height="15" viewBox="0 0 26 15" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25.707 8.07106C26.0975 7.68054 26.0975 7.04737 25.707 6.65685L19.343
                                    0.292887C18.9525 -0.0976379 18.3193 -0.097638 17.9288 0.292886C17.5383
                                    0.683411 17.5383 1.31658 17.9288 1.7071L23.5857 7.36395L17.9288 13.0208C17.5383
                                    13.4113 17.5383 14.0445 17.9288 14.435C18.3193 14.8255 18.9525 14.8255 19.343
                                    14.435L25.707 8.07106ZM-8.74228e-08 8.36395L24.9999 8.36395L24.9999 6.36395L8.74228e-08
                                    6.36395L-8.74228e-08 8.36395Z" fill="currentColor"/>
                </svg>
            </a>
        </h2>

        <br><br><br>
    </div>

    <?php 
        include './App/Views/Blocks/footer.html';     
    ?>
</body>
</html>
