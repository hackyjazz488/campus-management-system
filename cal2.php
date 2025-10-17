<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f9f9f9;
            margin: 40px;
        }
        h1 {
            color: #333;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #aaa;
        }
        th {
            background-color: #ddd;
        }
        .event {
            background-color: #b2fab4;
        }
        form {
            margin-top: 20px;
        }
        input {
            margin: 5px;
            padding: 5px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Simple Calendar with Events</h1>

<?php
// Database connection
function createConnection() {
    $db = new mysqli("localhost", "root", "", "campus");
    if ($db->connect_error) die("Connection failed: " . $db->connect_error);
    return $db;
}

// Add event
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['eventTitle'];
    $start = $_POST['eventStartDate'];
    $end = $_POST['eventEndDate'];

    $db = createConnection();
    $stmt = $db->prepare("INSERT INTO calendar_event_master (event_title, event_date, event_end_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $start, $end);
    $stmt->execute();
    $stmt->close();
    $db->close();
    echo "<p style='color:green;'>Event added successfully!</p>";
}

// Fetch events
function getEvents() {
    $db = createConnection();
    $result = $db->query("SELECT event_title, event_date, event_end_date FROM calendar_event_master");
    $events = [];
    while ($row = $result->fetch_assoc()) $events[] = $row;
    $db->close();
    return $events;
}

$month = date('n');
$year = date('Y');
$events = getEvents();

echo "<h2>" . date('F Y') . "</h2>";

echo "<table>";
echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>";

$firstDay = date('w', strtotime("$year-$month-01"));
$totalDays = date('t', strtotime("$year-$month-01"));
$day = 1;

for ($row = 0; $row < 6; $row++) {
    echo "<tr>";
    for ($col = 0; $col < 7; $col++) {
        if ($row == 0 && $col < $firstDay || $day > $totalDays) {
            echo "<td></td>";
        } else {
            $hasEvent = '';
            $eventTitle = '';
            foreach ($events as $event) {
                $start = strtotime($event['event_date']);
                $end = strtotime($event['event_end_date']);
                $current = strtotime("$year-$month-$day");
                if ($current >= $start && $current <= $end) {
                    $hasEvent = 'event';
                    $eventTitle = $event['event_title'];
                    break;
                }
            }
            echo "<td class='$hasEvent'>$day<br><small>$eventTitle</small></td>";
            $day++;
        }
    }
    echo "</tr>";
}
echo "</table>";
?>

<form method="post" action="">
    <label>Event Title:</label><br>
    <input type="text" name="eventTitle" required><br>
    <label>Start Date:</label><br>
    <input type="date" name="eventStartDate" required><br>
    <label>End Date:</label><br>
    <input type="date" name="eventEndDate"><br>
    <input type="submit" value="Add Event">
</form>

<p><a href="index.php">Back</a></p>

</body>
</html>
