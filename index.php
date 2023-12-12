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

if ($_GET['parking'] === 'yes') {
    $parking = true;
} elseif ($_GET['parking'] === 'no') {
    $parking = false;
} else {
    $parking = '';
}

if ($_GET['rating'] === '') {
    $rating = 0;
} elseif ($_GET['rating'] === '1') {
    $rating = 1;
} elseif ($_GET['rating'] === '2') {
    $rating = 2;
} elseif ($_GET['rating'] === '3') {
    $rating = 3;
} elseif ($_GET['rating'] === '4') {
    $rating = 4;
} elseif ($_GET['rating'] === '5') {
    $rating = 5;
}

var_dump($_GET, $parking, $rating);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <!-- <?php foreach ($hotels as $hotel) { ?>
            <h2>Hotel: <?php echo $hotel['name'] ?></h2>
            <p>Description: <?php echo $hotel['description'] ?></p>
            <p>Parking: <?php if ($hotel['parking'] === true) {
                            echo 'Yes';
                        } else {
                            echo 'No';
                        } ?></p>
            <p>Vote: <?php echo $hotel['vote'] ?> of 5</p>
            <p>Distance to center: <?php echo $hotel['distance_to_center'] ?> Km.</p>
        <?php } ?> -->

        <form action="index.php">

            <label for="parking">Parking</label>
            <select name="parking" id="parking">
                <option value=""></option>
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>

            <label for="rating">Rating</label>
            <select name="rating" id="rating">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <button type="submit">Search</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Hotel</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Km. to center</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($hotels); $i++) {
                    $cur_hotel = $hotels[$i];
                    if($cur_hotel['vote'] >= $rating) {
                    if($cur_hotel['parking'] === $parking || $parking === '') { ?>
                        <tr>
                            <td><?php echo $cur_hotel['name'] ?></td>
                            <td><?php echo $cur_hotel['description'] ?></td>
                            <td><?php if ($cur_hotel['parking'] === true) {
                                    echo 'Yes';
                                } else {
                                    echo 'No';
                                } ?></td>
                            <td><?php echo $cur_hotel['vote'] ?> of 5</td>
                            <td><?php echo $cur_hotel['distance_to_center'] ?> Km.</td>
                        </tr>
                <?php }
                }} ?>
            </tbody>
        </table>
    </div>
</body>

</html>