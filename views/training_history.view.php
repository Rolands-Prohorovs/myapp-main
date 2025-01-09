
<?php require ('partials/head.php') ?>
<?php require ('partials/nav.php') ?>
<?php require ('partials/banner.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;

        }

        .training-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .training {
            background-color: #000;
            color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
        }

        .training h1 {
            text-align: center;
            margin-top: 0;
        }

        .training p {
            text-align: center;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="training-container">
    <div class="training">
        <h1>Training History</h1>
        <?php
        $training_history = file_get_contents("training_history.txt");
        if ($training_history) {
            echo nl2br($training_history); // Preserve line breaks
        } else {
            echo "<p>No training history yet.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>



