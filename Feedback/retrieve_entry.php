<?php
include "../Database/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Retrieved Scroll</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="container">
    <h1>🪄 Retrieved Guest Entry</h1>

    <?php
    if (isset($_GET['entry_id'])) {
        $id = $_GET['entry_id'];

        try {
            $stmt = $conn->prepare("SELECT * FROM entries WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                echo "<p>No scroll found with ID: $id 🫧</p>";
            } else {
                $entry = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "<div class='summary'>";
                echo "<p><strong>🧚 Name:</strong> {$entry['name']}</p>";
                echo "<p><strong>🌸 Variant:</strong> {$entry['variant']}</p>";
                echo "<p><strong>📦 Size:</strong> {$entry['size']}</p>";
                echo "<p><strong>🔢 Quantity:</strong> {$entry['quantity']}</p>";
                echo "<p><strong>💰 Total:</strong> ₱{$entry['total_price']}</p>";
                echo "<p><strong>✨ Message:</strong> {$entry['message']}</p>";
                echo "<p><strong>📅 Date:</strong> " . date("F j, Y, g:i a", strtotime($entry['date_posted'])) . "</p>";
                echo "</div>";
            }
        } catch (PDOException $e) {
            echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p>No scroll ID was provided. 🪄</p>";
    }
    ?>

    <div class="left-buttons">
      <a href="../pages/retrieve.html" class="nav-button">🔎 Seek Another Scroll</a>
      <a href="../pages/index.html" class="nav-button">🔙 Return to Grimoire</a>
    </div>
  </div>
</body>
</html>
