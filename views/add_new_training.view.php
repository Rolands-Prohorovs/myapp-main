
<?php require ('partials/head.php') ?>


<?php require ('partials/nav.php') ?>


<?php require ('partials/banner.php') ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $date = $_POST['date'];
    $time_spent = $_POST['time_spent'];
    $exercises = $_POST['exercises'] ?? [];

    $training_data = "Training History\n";
    $training_data .= "Date: $date, Time Spent (minutes): $time_spent\n\n";


    foreach ($exercises as $exercise) {

        if (isset($exercise['exercise_name']) && isset($exercise['sets'])) {
            $exercise_name = $exercise['exercise_name'];
            $sets = $exercise['sets'];

            $exercise_data = "Exercise: $exercise_name\n";

            $set_number = 1;
            foreach ($sets as $set) {
                // Check if reps and weight are set for the set
                if (isset($set['reps']) && isset($set['weight'])) {
                    $reps = $set['reps'];
                    $weight = $set['weight'];
                    $exercise_data .= "Set $set_number:\n";
                    $exercise_data .= "Reps: $reps, Weight: $weight kg\n";

                }
                $set_number++;
            }

            $training_data .= "$exercise_data\n";
        }

        if (!isset($exercise['exercise_name'])) {

        }

    }

    file_put_contents("training_history.txt", $training_data . "\n", FILE_APPEND);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Training</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="date"],
        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .exercise {
            margin-bottom: 20px;
        }

        .set {
            margin-bottom: 10px;
        }

        .add-set,
        .add-exercise,
        .add-training{
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .add-set:hover,
        .add-exercise:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
<form action="" method="POST">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="time_spent">Time Spent (minutes):</label>
    <input type="number" id="time_spent" name="time_spent" required><br><br>

    <div id="exercises">
        <div class="exercise" data-exercise="0">
            <label for="exercise_name">Exercise Name:</label>
            <input type="text" name="exercises[0][exercise_name]" required><br><br>

            <div class="sets">
                <label for="sets_0">Set 1</label>
                <div class="set">

                    <label for="reps_0">Reps:</label>
                    <input type="number" name="exercises[0][sets][0][reps]" id="reps_0" required>

                    <label for="weight_0">Weight (kg):</label>
                    <input type="number" name="exercises[0][sets][0][weight]" id="weight_0" required><br><br>
                </div>
            </div>


            <button type="button" class="add-set">Add Set</button><br><br>
        </div>
    </div>

    <button type="button" class="add-exercise">Add Exercise</button><br><br>

    <button type="submit" class="add-training">Add Training</button>
</form>
<script>
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('add-set')) {
            var exerciseDiv = event.target.closest('.exercise');
            var setsDiv = exerciseDiv.querySelector('.sets');
            var setCount = setsDiv.querySelectorAll('.set').length + 1;

            let eIndex = exerciseDiv.dataset.exercise * 1;

            var newSetHTML = '<div class="set"><label>Set ' + setCount + '</label><br>' +
                '<label for="reps_' + setCount + '">Reps:</label>' +
                '<input type="number" name="exercises[' + (eIndex) + '][sets][' + (setCount - 1) + '][reps]" id="reps_' + setCount + '" required><br>' +
                '<label for="weight_' + setCount + '">Weight (kg):</label>' +
                '<input type="number" name="exercises[' + (eIndex) + '][sets][' + (setCount - 1) + '][weight]" id="weight_' + setCount + '" required><br><br></div>';

            setsDiv.insertAdjacentHTML('beforeend', newSetHTML);
        }

        if (event.target.classList.contains('add-exercise')) {
            return; // this can be deleted
            var exerciseCount = document.querySelectorAll('.exercise').length;

            var newExerciseHTML = '<div class="exercise">' +
                '<label for="exercise_name">Exercise Name:</label>' +
                '<input type="text" name="exercises[' + exerciseCount + '][exercise_name]" required>' +
                '<br><br>' +
                '<div class="sets">' +
                '<div class="set">' +
                '<label>Set 1</label><br>' +
                '<label for="reps_0">Reps:</label>' +
                '<input type="number" name="exercises[' + exerciseCount + '][sets][0][reps]" id="reps_' + exerciseCount + '" required><br>' +
                '<label for="weight_0">Weight (kg):</label>' +
                '<input type="number" name="exercises[' + exerciseCount + '][sets][0][weight]" id="weight_' + exerciseCount + '" required><br><br>' +
                '</div></div><button type="button" class="add-set">Add Set</button><br><br>' +
                '</div>';

            document.getElementById('exercises').insertAdjacentHTML('beforeend', newExerciseHTML);
        }
    });
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('add-exercise')) {
            var exercisesContainer = document.getElementById('exercises');
            var exerciseCount = exercisesContainer.children.length;

            var newExerciseDiv = document.createElement('div');
            newExerciseDiv.className = 'exercise';
            newExerciseDiv.dataset.exercise = exerciseCount;

            var exerciseNameLabel = document.createElement('label');
            exerciseNameLabel.textContent = 'Exercise Name:';
            var exerciseNameInput = document.createElement('input');
            exerciseNameInput.type = 'text';
            exerciseNameInput.name = 'exercises[' + exerciseCount + '][exercise_name]';
            exerciseNameInput.required = true;

            var setsDiv = document.createElement('div');
            setsDiv.className = 'sets';

            var newSetDiv = document.createElement('div');
            newSetDiv.className = 'set';

            var repsLabel = document.createElement('label');
            repsLabel.textContent = 'Reps:';
            var repsInput = document.createElement('input');
            repsInput.type = 'number';
            repsInput.name = 'exercises[' + exerciseCount + '][sets][0][reps]';
            repsInput.required = true;

            var weightLabel = document.createElement('label');
            weightLabel.textContent = 'Weight (kg):';
            var weightInput = document.createElement('input');
            weightInput.type = 'number';
            weightInput.name = 'exercises[' + exerciseCount + '][sets][0][weight]';
            weightInput.required = true;

            newSetDiv.appendChild(repsLabel);
            newSetDiv.appendChild(repsInput);
            newSetDiv.appendChild(weightLabel);
            newSetDiv.appendChild(weightInput);

            var addSetButton = document.createElement('button');
            addSetButton.type = 'button';
            addSetButton.className = 'add-set';
            addSetButton.textContent = 'Add Set';

            newExerciseDiv.appendChild(exerciseNameLabel);
            newExerciseDiv.appendChild(exerciseNameInput);
            newExerciseDiv.appendChild(setsDiv);
            setsDiv.appendChild(newSetDiv);
            newExerciseDiv.appendChild(addSetButton);

            exercisesContainer.appendChild(newExerciseDiv);
        }
        
    });

</script>
</body>
</html>

