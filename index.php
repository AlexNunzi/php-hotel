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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Hotel</title>
</head>
<body>
    
<main class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Nome hotel</th>
          <th scope="col">Descrizione</th>
          <th scope="col">Disponibilità parcheggio</th>
          <th scope="col">Voto</th>
          <th scope="col">Distanza dal centro</th>
        </tr>
      </thead>
      <tbody>
            <?php
                foreach($hotels as $hotel){
                    echo "<tr>";
                    foreach($hotel as $info => $value){
                        switch ($info){
                            case "name":
                                echo "<th scope='row'>" . $value . "</th>";
                                break;
                            case "parking":
                                if($value == true){
                                    echo "<td>" . "Disponibile" . "</td>";
                                } else {
                                    echo "<td>" . "Non disponibile" . "</td>";
                                }
                                break;
                            case "distance_to_center":
                                echo "<td>" . $value . " Km" . "</td>";
                                break;
                            default:
                                echo "<td>" . $value . "</td>";
                        }
                    }
                    echo "</tr>";
                }
            ?>
      </tbody>
    </table>
</main>


</body>
</html>