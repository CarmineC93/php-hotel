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
        <table class="table">
            <?php foreach ($hotels as $key => $info) { ?>
                <thead>
                    <tr>
                        <th scope="col"> <?php echo $key["name"]; ?> </th>
                        <th scope="col"> <?php echo $key["description"]; ?> </th>
                        <th scope="col"> <?php echo $key["parking"]; ?> </th>
                        <th scope="col"> <?php echo $key["vote"]; ?> </th>
                        <th scope="col"> <?php echo $key["distance_to_center"]; ?> </th>
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