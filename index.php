<!--
Esercizio di oggi: PHP Hotel
nome repo: php-hotel

Descrizione
Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
Copiatelo su un vostro file per usarlo nell'esercizio
Prima stampate in pagina i dati, senza preoccuparvi dello stile ed effettuate un push con questo risultato.
Solo dopo aggiungete Bootstrap e mostrate le informazioni all'interno di una tabella.
Non è necessario spezzettare l'esercizio coi partials ma se ci riuscite tanto meglio 

Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.

2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA :mega:: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.

-->

<?php
require 'partials/data/hotel.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS">
    <meta name="author" content="Monica Izzo">
    <title>PHP Hotel</title>

    <!-- icon-->
    <link rel="icon" type="image/png" sizes="32x32" href="img/faicon.png">

    <!-- stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <!-- HEADER -->
        <header>
            <h1>Hotels</h1>
        </header>
        <!-- MAIN -->
        <main>
            <ul>
                <?php foreach ($hotels as $hotel) : ?>
                    <li><?= $hotel['name'] ?></li>
                <?php endforeach ?>
            </ul>
        </main>

    </div>
</body>

</html>