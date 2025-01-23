<?php
require 'db_connection.php';

$sql = "SELECT * FROM routines ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Routines</title>
</head>
<body>
    <h1>Uploaded Routines</h1>
    <ul>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <strong><?php echo htmlspecialchars($row['title']); ?></strong><br>
                    <!-- Updated View File Link -->
                    <a href="apexmodelschool/<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">View File</a>
                    <!-- Download File Link -->
                    <a href="download_file.php?id=<?php echo $row['id']; ?>">Download File</a><br>
                    <small>Uploaded at: <?php echo $row['uploaded_at']; ?> | 
                    Downloads: <?php echo isset($row['downloads']) ? $row['downloads'] : 0; ?></small>
                </li><br>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No routines uploaded yet.</p>
        <?php endif; ?>
    </ul>
</body>
</html>
