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

<body>
    <h1>HOTELS</h1>

    <section>
        <h4>SEARCH WITH A FILTER</h4>
        <form action="index.php" method="GET">
            <label for="park">Parking</label>
            <select id="park" name="park">
                <option value="with">With</option>
                <option value="without">Without</option>
            </select>

            <button type="submit">Filter</button>
        </form>
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
                    <th scope="row"><?php echo $info["name"]; ?></th>
                    <td><?php echo $info["description"]; ?></td>
                    <td>
                        <?php
                        if ($info["parking"] === True) {
                            echo "SI";
                        } else {
                            echo "NO";
                        } ?>
                    </td>
                    <td><?php echo $info["vote"] . "/5"; ?></td>
                    <td><?php echo $info["distance_to_center"] . "km"; ?></td>
                </tr>

            </tbody>
        <?php } ?>
        </table>
    </section>
</body>

</html>