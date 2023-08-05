<?php
require_once("include/dbconn.php");
$query = "SELECT * FROM messages ORDER BY id DESC"; // Adjust the query as needed
$result = mysqli_query($ConnStrx, $query);
$querry2 = "SELECT month , count FROM message_counts ORDER BY month ASC";
$result2=mysqli_query($ConnStrx,$querry2);
$sentMessages = []; // Initialize an array to hold the sent messages

while ($row = mysqli_fetch_assoc($result)) {
    $sentMessages[] = $row;
}
while ($row = mysqli_fetch_assoc($result2)) {
    $sentMessage[] = $row;
}
$chartData = [];
$chartLabels = [];
foreach ($sentMessage as $messages) {
    $chartLabels[] = $messages['month']; // Assuming you have a 'date' column
    $chartData[] = $messages['count']; // Assuming you have a 'count' column
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="about.php">
          <img src="./include/favicon_io/favicon-16x16.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
          Salem Server
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logon.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view.php">View</a>
            </li>
          </ul>
        </div>
      </nav>
<div class="container">
    <h1 class="mt-5">Sent Messages</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Message</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sentMessages as $message): ?>
                <tr>
                    <td><?= $message['id'] ?></td>
                    <td><?= $message['sender'] ?></td>
                    <td><?= $message['reciever'] ?></td>
                    <td><?= $message['body'] ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
<div class="chart-container" style="position: relative; height: 300px; width: 80%;">
    <canvas id="myChart" width="200" height="200"></canvas>
</div>

<script>
const chart = new Chart(document.getElementById("myChart"), {
    type: "line",
    data: {
        labels: <?= json_encode($chartLabels) ?>, // Encode PHP array as JSON
        datasets: [{
                    label: "SMS Messages Sent",
                    data: <?= json_encode($chartData) ?>, // Encode PHP array as JSON
                    fill: false,
                    lineTension: 0.1,
        }]
    },
    options: {
        maintainAspectRatio: false,
        title: {
            display: true,
            text: "Message History",
            fontSize: 16,
        },
        legend: {
            display: true,
            position: "bottom",
        },
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: "Month",
                    fontSize: 14,
                },
                ticks: {
                    fontSize: 12,
                },
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: "Number of Messages",
                    fontSize: 14,
                },
                ticks: {
                    fontSize: 12,
                    beginAtZero: true,
                },
            }],
        },
    },
});
</script>
</body>
</html>
