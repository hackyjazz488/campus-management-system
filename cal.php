<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calendar with Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background: url("cc.jpg") fixed center no-repeat;
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

        .event-cell {
            background-color: #aaffaa; /* Light green background for cells with events */
        }

        .event-name, label, input {
            color: black; /* Set text color to white */
        }

        .event-name {
            font-weight: bold;
        }

        form {
            display: none; /* Hide the form */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            padding: 5px;
            margin-bottom: 10px;
            color: black;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: black;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1><b>Calendar with Events</b></h1>

    <?php
    // Function to create a MySQLi connection
    function createConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "campus";

        $db = new mysqli($servername, $username, $password, $dbname);

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        return $db;
    }

    // Function to get events from the database
    function getEventsFromDatabase($db) {
        $events = array();

        $sql = "SELECT event_date, event_end_date, event_title FROM calendar_event_master";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
        }

        return $events;
    }

    // Function to determine the cell class and get event name based on events
    function getCellClass($day, $events) {
        global $year, $month; // Declare $year as global

        foreach ($events as $event) {
            $startDate = strtotime($event['event_date']);
            $endDate = strtotime($event['event_end_date']);

            // Convert $day to a timestamp for comparison
            $currentDayTimestamp = strtotime("$year-$month-$day");

            if ($currentDayTimestamp >= $startDate && $currentDayTimestamp <= $endDate) {
                return isset($event['event_title']) ? $event['event_title'] : '';
            }
        }
        return '';
    }

    // Get the current month and year
    $month = date('n');
    $year = date('Y');

    // Get events from the database
    $events = getEventsFromDatabase(createConnection());

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
            $cellClass = '';
            $eventName = getCellClass($currentDay, $events);
            if ($dayCount > $firstDay && $currentDay <= $totalDays) {
                $cellClass = $eventName ? 'event-cell' : '';
                echo "<td class='$cellClass'>$currentDay<br><span class='event-name'>$eventName</span></td>";
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
    <p>
       <a href="index_user.php">back</a>
    </p>


</body>
</html>
