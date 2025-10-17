<!DOCTYPE html>
<html lang="en">
<head>
   
    <title> Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background: url("bb.jpg") fixed center no-repeat;
            background-size: cover;
        }
        h1 {
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background for better readability */
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            color: black;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1><b> Calendar</b></h1>

    <?php
        // Get the current month and year
     $month = date('n');
        $year = date('Y');

        // Output the month and year
        echo "<h2>" . date('F Y', strtotime("$year-$month-01")) . "</h2>";

        // Output the calendar table
        echo "<table>";
        echo "<tr>";
        echo "<th>Sun</th>";
        echo "<th>Mon</th>";
        echo "<th>Tue</th>";
        echo "<th>Wed</th>";
        echo "<th>Thu</th>";
        echo "<th>Fri</th>";
        echo "<th>Sat</th>";
        echo "</tr>";

        // Get the first day of the month and the total number of days in the month
        $firstDay = date('w', strtotime("$year-$month-01"));
        $totalDays = date('t', strtotime("$year-$month-01"));

        // Initialize variables
        $dayCount = 1;
        $currentDay = 1;

        // Output the calendar rows
        for ($row = 0; $row < 6; $row++) {
            echo "<tr>";
            for ($col = 0; $col < 7; $col++) {
                if ($dayCount > $firstDay && $currentDay <= $totalDays) {
                    echo "<td>$currentDay</td>";
                    $currentDay++;
                } else {
                    echo "<td></td>";
                }
                $dayCount++;
            }
            echo "</tr>";
        }

        echo "</table>";
    ?>

</body>
</html>
