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

    $fiteredHotels = $hotels;
 
if(!empty($_GET['parking']) ){

  $secArray = [];

  foreach($fiteredHotels as $hotel){
    if($hotel['parking']){
      $secArray[] = $hotel;
    }
  }
  $fiteredHotels = $secArray;

}

if(isset($_GET['parking']) && empty($_GET['parking'])){

  $secArray = [];

  foreach($fiteredHotels as $hotel){
    if(!$hotel['parking']){
      $secArray[] = $hotel;
    }
  }
  $fiteredHotels = $secArray;

}



if(!empty($_GET['voto']) ){

  $secArray = [];

  foreach($fiteredHotels as $hotel){
   if ($hotel['vote'] >= $_GET['voto']) {
    $secArray[] = $hotel;
    }
  }

  $fiteredHotels = $secArray;

}





    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Hotels</title>
</head>
<body>

    <h1 class="text-center mb-5">Hotels</h1>
    
<div class="container">

<form action="index.php" method="GET">
    
    <input class="me-1" type="radio" name="parking" id="yes" value="1">
    <label for="yes">Con Parcheggio</label>

    
    <input class="ms-5" type="radio" name="parking" id="no" value=""  >
    <label for="no">Senza Parcheggio</label>


    <label class="ms-5" for="">Voto</label>
    <input class="me-5" type="number" name="voto" min="1" max="5">

    <button class="btn btn-primary ms-5" type="submit">Send</button>
    <button class="btn btn-secondary ms-5" type="submit">Reset</button>

</form>

</div>
    
<div class="container mt-5  table-cnt">
<table  class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parcheggio</th>
      <th scope="col">Voto</th>
      <th scope="col">Distanza dal Centro</th>
    </tr>
   
  </thead>
  <tbody  >
 <?php foreach($fiteredHotels as $hotel){

  echo '<tr>';
  echo '<td>' . $hotel['name'] . '</td>';
  echo '<td>' . $hotel['description'] . '</td>';
  echo '<td>' . ($hotel['parking'] ? 'Si': 'No'). '</td>';
  echo '<td>' . $hotel['vote'] . '</td>';
  echo '<td>' . $hotel['distance_to_center'] . '</td>';
  echo '</tr>';

    }
 ?>
  </tbody>

</table>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>