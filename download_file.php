<?php
require 'db_connection.php';

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $fileId = $_GET['id'];

    // Retrieve the file details from the database
    $sql = "SELECT * FROM routines WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $fileId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Increment the download count
        $newDownloadCount = $row['downloads'] + 1;
        $updateSql = "UPDATE routines SET downloads = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ii", $newDownloadCount, $fileId);
        if ($updateStmt->execute()) {
            // Get the file path
            $baseDir = '/path/to/routines/';
            $filePath = $baseDir . $row['file_path'];

            // Ensure the file is within the allowed directory
            if (realpath($filePath) !== false && strpos(realpath($filePath), realpath($baseDir)) === 0) {
                // Set the headers for the file download
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
                header('Content-Length: ' . filesize($filePath));

                // Clear output buffer to avoid any errors
                ob_clean();
                flush();

                // Output the file to the browser
                readfile($filePath);
                exit;
            } else {
                echo "Invalid file path.";
                exit;
            }
        } else {
            echo "Error updating download count.";
        }
    } else {
        echo "Invalid file ID.";
    }
} else {
    echo "No file specified.";
}
?>
