<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>

<body>

    <h1>Task For The Day</h1>

    <ul>
        <li>
            <strong>Name: </strong> <?= $task['title'];?>
        </li>

        <li>
            <strong>Due By: </strong> <?= $task['due'];?>
        </li>

        <li>
            <strong>Person Responsible: </strong> <?= $task['assigned_to'];?>
        </li>

        <li>

            <strong>Completed: </strong>


            <?php 
            
            if ($task['completed']) : ?>

                <span class="icon">Yes &#9989;</span>


            <?php else : ?>
                
                <span class="icon">No &#10062;</span>

            <?php endif; ?>

        </li>



    </ul>