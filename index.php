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


    $data = $_GET;
    $filteredHotels = $hotels;

    if(!empty($data)){
        if(isset($data['parkingCheck']) && !empty($data['parkingCheck'])){
            $filteredByPark = [];
            foreach($filteredHotels as $hotel){
                if($hotel['parking'] == true){
                    $filteredByPark[] = $hotel;
                }
            }
            $filteredHotels = $filteredByPark;
        }
        if(isset($data['filterByRating']) && !empty($data['filterByRating'])){
            $filteredByVote = [];
            foreach($filteredHotels as $hotel){
                if($hotel['vote'] >= $data['filterByRating']){
                    $filteredByVote[] = $hotel;
                }
            }
            $filteredHotels = $filteredByVote;
        }
    }

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
    
<main class="container my-5">
    <h1 class="mb-3 text-center">Hotel</h1>
    <form class="d-flex justify-content-between border px-1 py-3 mb-3" action="index.php" method="GET">
        <div>
            <input type="checkbox" class="form-check-input" id="parkingCheck" name="parkingCheck" value="parkOnly">
            <label class="form-check-label mb-4" for="parkingCheck">Mostra solo hotel con parcheggio</label>

            <label class="form-label d-block" for="filterByRating">Filtra in base al voto</label>
            <select name="filterByRating" id="filterByRating" class="form-select">
                <option value="0">Non filtrare per voto</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>

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
                foreach($filteredHotels as $hotel){
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