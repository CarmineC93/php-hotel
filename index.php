<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

//creo due variabili con un controllo coalescing operator. Se l'utente non da nessun valore all'input, questo sarà "all" 
$prefParking = $_GET["park"] ?? "all";

$prefVote = $_GET["vote"] ?? "all";

var_dump($_GET);

/*
//UN ALTRO MODO è CREARE UN ARRAY CHE PRENDA SOLO GLI ELEMENTI CHE RIENTRANO NELLE CONDIZIONI DEI FILTRI, E STAMPARE QUELLO
$filtered_hotels = $hotels;
$filter_by_parking = $_GET["park"] ?? "";
$filter_by_vote = $_GET["vote"] ?? "";


if (!empty($filter_by_parking)) {
    $tempHotels = [];
    foreach ($filtered_hotels as $hotel) {
        if ($hotel["parking"]) {
            $tempHotels[] = $hotel;
        }
    }
    $filtered_hotels = $tempHotels;

    //oppure TERZO MODO CON array_filter all'interno del if
    // $filtered_hotels = array_filter($filtered_hotels, fn ($hotel) => $hotel["parking"]);
}

if (!empty($filter_by_vote)) {
    //trasformiamo in numero intero
    $filter_by_vote = intval($filter_by_vote);
    //variabile d'appoggio
    $tempHotels = [];
    //poichè potremmo aver già il filtro parking attivo, cicliamo l'array filtered_hotels
    foreach ($filtered_hotels as $hotel) {
        if ($hotel["vote"] >= $filtered_by_vote);
        $temp_hotels[] = $hotel;
    };
    $filtered_hotels = $temp_hotels;

    //oppure TERZO MODO CON array_filter all'interno del if
    // $filtered_hotels = array_filter($filtered_hotels, fn ($hotel) => $hotel["vote"] >= $filtered_by_vote);
}

/*poi nella stampa il foreach ciclerà dal filtered_hotels e
non da $hotels, e non saranno necessarie ovviamente le condizioni if */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="p-3">
    <h1>HOTELS</h1>

    <section class="p-3">
        <h4>SEARCH WITH A FILTER</h4>
        <form action="index.php" method="GET">
            <label for="park">Parking</label>
            <select name="park" id="park">
                <option value="all">All</option>
                <option value="with">With</option>
                <option value="without">Without</option>
            </select>
            <br>
            <label for="vote">Voto</label>
            <select name="vote" id="vote">
                <option value="all">All</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br>
            <button class="btn-success" type="submit">Filter</button>
        </form>
    </section>

    <section class="p-3">
        <h5>FILTRI APPLICATI:</h5>
        <p> <strong><?php echo $prefParking ?></strong> parking </p>
        <p> With <strong><?php echo $prefVote ?></strong> or more stars </p>
    </section>

    <section>
        <table class="table">
            <thead>
                <tr>
                    <?php foreach ($hotels[0] as $key => $detail) { ?>
                        <th scope="col"> <?php echo $key ?> </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <!-- generiamo dinamicamente con i valori degli array interni ad hotels-->

                <?php foreach ($hotels as $key => $oneHotel) { ?>
                    <tr>
                        <!-- se l'utente non ha ancora fatto nessuna scelta tutti quelli generati sono visibili -->
                        <!-- CASO 1 NESSUNA SCELTA -->
                        <?php if (($prefParking === "all") && ($prefVote === "all")) { ?>
                            <td scope="row"><?php echo $oneHotel["name"]; ?></td>
                            <td><?php echo $oneHotel["description"]; ?></td>
                            <td>
                                <?php if ($oneHotel["parking"]) {
                                    echo "SI";
                                } else {
                                    echo "NO";
                                }
                                ?>
                            </td>
                            <td><?php echo $oneHotel["vote"] . "/5"; ?></td>
                            <td><?php echo $oneHotel["distance_to_center"] . "km"; ?></td>
                            <td> <?php echo "caso 1" ?> </td>

                            <!-- altrimenti se l'utente ha fatto almeno una scelta cicliamo e stampiamo solo gli hotel che passano il controllo if-->
                            <!-- questa soluzione presuppone 4 casi: caso 1 ALL-ALL, caso 2 PARK/NOPARK-ALL, caso 3 ALL-STAR, caso 4 PARK/NOPARK-STAR
                            Non funziona come soluzione, nel caso ci fossero già solo tre filtri, le combinazioni possibili diventando 8 -->

                            <!-- CASO 2 SCEGLIE SOLO PARCHEGGIO -->
                        <?php } elseif ((($prefParking === "with" && $oneHotel["parking"])  || ($prefParking === "without" && !$oneHotel["parking"])) && ($prefVote === "all")) { ?>
                            <td scope="row"><?php echo $oneHotel["name"]; ?></td>
                            <td><?php echo $oneHotel["description"]; ?></td>
                            <td>
                                <?php
                                if ($oneHotel["parking"]) {
                                    echo "SI";
                                } else {
                                    echo "NO";
                                } ?>
                            </td>
                            <td> <?php echo $oneHotel["vote"] . "/5"; ?></td>
                            <td><?php echo $oneHotel["distance_to_center"] . "km"; ?></td>
                            <td> <?php echo "caso 2" ?> </td>

                            <!-- CASO 3 SCEGLIE SOLO STELLE -->
                        <?php } elseif (($prefParking === "all") && ($prefVote <= $oneHotel["vote"])) { ?>
                            <td scope="row"><?php echo $oneHotel["name"]; ?></td>
                            <td><?php echo $oneHotel["description"]; ?></td>
                            <td>
                                <?php
                                if ($oneHotel["parking"]) {
                                    echo "SI";
                                } else {
                                    echo "NO";
                                } ?>
                            </td>
                            <td> <?php echo $oneHotel["vote"] . "/5"; ?></td>
                            <td><?php echo $oneHotel["distance_to_center"] . "km"; ?></td>
                            <td> <?php echo "caso 3" ?> </td>

                            <!-- CASO 4 SCEGLIE ENTRAMBE -->
                        <?php } elseif ((($prefParking === "with" && $oneHotel["parking"])  || ($prefParking === "without" && !$oneHotel["parking"])) && ($prefVote <= $oneHotel["vote"]) && ($prefVote != "all")) { ?>
                            <td scope="row"><?php echo $oneHotel["name"]; ?></td>
                            <td><?php echo $oneHotel["description"]; ?></td>
                            <td>
                                <?php
                                if ($oneHotel["parking"]) {
                                    echo "SI";
                                } else {
                                    echo "NO";
                                } ?>
                            </td>
                            <td> <?php echo $oneHotel["vote"] . "/5"; ?></td>
                            <td><?php echo $oneHotel["distance_to_center"] . "km"; ?></td>
                            <td> <?php echo "caso 4" ?> </td>
                        <?php } ?>
                    <?php } ?>



                    </tr>
            </tbody>
        </table>
    </section>
</body>

</html>