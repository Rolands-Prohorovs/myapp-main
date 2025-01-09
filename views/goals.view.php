
<?php require ('partials/head.php') ?>
<?php require ('partials/nav.php') ?>
<?php require ('partials/banner.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Goals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .goal-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .goal-item input[type="checkbox"] {
            margin-right: 10px;
        }

        .goal-item button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
        }

        .goal-item button:hover {
            background-color: #0056b3;
        }

        .goal-item input[type="text"] {
            display: none;
            padding: 3px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>My Gym Goals</h1>
    <form id="goal-form">
        <input type="text" id="goal-input" placeholder="Enter your goal...">
        <button type="submit" style=" background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;">Add Goal</button>
    </form>
    <div id="goal-list"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('goal-form');
        const input = document.getElementById('goal-input');
        const goalList = document.getElementById('goal-list');

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const goalText = input.value.trim();
            if (goalText !== '') {
                addGoal(goalText);
                input.value = '';
            }
        });

        function addGoal(text) {
            const goalItem = document.createElement('div');
            goalItem.className = 'goal-item';
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            const label = document.createElement('label');
            label.textContent = text;
            const editInput = document.createElement('input');
            editInput.type = 'text';
            const editButton = document.createElement('button');
            editButton.textContent = 'Edit';
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            goalItem.appendChild(checkbox);
            goalItem.appendChild(label);
            goalItem.appendChild(editInput);
            goalItem.appendChild(editButton);
            goalItem.appendChild(deleteButton);
            goalList.appendChild(goalItem);

            checkbox.addEventListener('change', function () {
                if (checkbox.checked) {
                    label.style.textDecoration = 'line-through';
                } else {
                    label.style.textDecoration = 'none';
                }
            });

            editButton.addEventListener('click', function () {
                if (editButton.textContent === 'Edit') {
                    editInput.style.display = 'inline-block';
                    editInput.value = label.textContent;
                    label.style.display = 'none';
                    editButton.textContent = 'Save';
                } else {
                    editInput.style.display = 'none';
                    label.textContent = editInput.value;
                    label.style.display = 'inline';
                    editButton.textContent = 'Edit';
                }
            });

            deleteButton.addEventListener('click', function () {
                goalItem.remove();
            });
        }
    });
</script>
</body>
</html>

