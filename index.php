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
                <option value="all">all</option>
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
                <?php foreach ($hotels as $key => $info) { ?>
                    <tr>
                        <?php foreach ($info as $key => $detail) { ?>
                            <th scope="col"> <?php echo $key ?> </th>
                        <?php } ?>
                    </tr>
            </thead>
            <tbody>
                <tr>
                    <?php if (
                        ($prefParking === "with" && $info["parking"]  || $prefParking === "without" && !$info["parking"])
                        && ($prefVote >= $info["vote"])
                    ) { ?>


                        <td scope="row"><?php echo $info["name"]; ?></td>
                        <td><?php echo $info["description"]; ?></td>
                        <td>
                            <?php
                            if ($info["parking"]) {
                                echo "SI";
                            } else {
                                echo "NO";
                            } ?>
                        </td>
                        <td> <?php echo $info["vote"] . "/5"; ?></td>
                        <td><?php echo $info["distance_to_center"] . "km"; ?></td>

                    <?php } ?>

                </tr>
            </tbody>
        <?php } ?>
        </table>
    </section>
</body>

</html>

<!-- per ogni array devo capire se il valore di una sua key sia associabile . -->