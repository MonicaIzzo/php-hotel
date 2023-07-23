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
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.

-->

<?php
require 'partials/data/hotel.php';

// Preparo i valori dei default
$checked = '';
$rating = $_GET['rating'] ?? null;

// Controllo se devo filtare per parcheggio
if (isset($_GET['parking'])) {
    // setto il flag per spuntare il checkbox
    $checked = 'checked';

    $parking_hotels = [];

    foreach ($hotels as $hotel) {
        if ($hotel['parking']) $parking_hotels[] = $hotel;
    }

    $hotels = $parking_hotels;
}

// filtro per voto
if ($rating) {
    $filtered_hotels = [];

    foreach ($hotels as $hotel) {
        if ($hotel['vote'] >= $rating) $filtered_hotels[] = $hotel;
    }
    $hotels = $filtered_hotels;
}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-5">
        <!-- HEADER -->
        <header>
            <hr>
            <h1>Hotels</h1>
            <form action="" method="GET">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" value="" id="parking" name="parking" <?= $checked ?>>
                        <label for="parking" class="form-check-label">Mostra solo hotel con parcheggio</label>
                    </div>

                    <div class="mb-3 d-flex align-items-center">
                        <label for="rating" class="form-label me-2">Rating</label>
                        <input type="number" class="form-control" id="rating" name="rating" value="<?= $rating ?? 1 ?>" min="1" max="5" step="1">

                    </div>
                    <button class="btn btn-primary" type="submit">Filtra</button>
                </div>
            </form>
            <hr>
        </header>
        <!-- MAIN -->
        <main>
            <table class=" table">
                <!-- Intestazione tabella -->
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance</th>
                    </tr>
                </thead>
                <!-- Corpo della tabella-->
                <tbody>
                    <?php foreach ($hotels as $hotel) : ?>
                        <tr>
                            <th scope="row"><?= $hotel['name'] ?></th>
                            <td><?= $hotel['description'] ?></td>
                            <!-- PARKING -->
                            <td>
                                <?php $icon = $hotel['parking'] ? 'bi-check-circle-fill text-success' : 'bi-x-circle-fill text-danger' ?>
                                <i class="bi <?= $icon ?>"></i>
                            </td>
                            <td><?= $hotel['vote'] ?> /5</td>
                            <td><?= $hotel['distance_to_center'] ?> Km</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>