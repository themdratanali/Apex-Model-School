<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

require 'db.php';

// Handle the form submission for uploading a routine
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $file = $_FILES['file'];

    // Check if the file was uploaded successfully
    if ($file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/routine';  // Adjust the path to your Admin folder

        // Check if the upload directory exists, create it if it doesn't
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            $relativePath = 'apexmodelschool/' . basename($file['name']);  // Store the relative file path

            // Insert the routine details into the database
            $sql = "INSERT INTO routines (title, file_path) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $title, $relativePath);
            $stmt->execute();

            echo "Routine uploaded successfully!";
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "File upload error.";
    }
}

// Fetch all the routines from the database to display them
$sql = "SELECT * FROM routines ORDER BY uploaded_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Routine</title>
</head>
<body>
    <h1>Upload Routine</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="file">Select File (PDF or Image):</label>
        <input type="file" id="file" name="file" accept=".pdf,.jpg,.jpeg,.png" required><br><br>
        <button type="submit">Upload</button>
    </form>

    <h1>Uploaded Routines</h1>
    <ul>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <strong><?php echo htmlspecialchars($row['title']); ?></strong><br>
                    <!-- Updated View File Link -->
                    <a href="apexmodelschool/<?php echo htmlspecialchars($row['file_path']); ?>" target="_blank">View File</a>
                    <!-- Download File Link -->
                    <a href="database/download_file.php?id=<?php echo $row['id']; ?>">Download File</a><br>
                    <small>Uploaded at: <?php echo $row['uploaded_at']; ?> | 
                    Downloads: <?php echo isset($row['downloads']) ? $row['downloads'] : 0; ?></small>
                </li><br>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No routines uploaded yet.</p>
        <?php endif; ?>
    </ul>

    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
