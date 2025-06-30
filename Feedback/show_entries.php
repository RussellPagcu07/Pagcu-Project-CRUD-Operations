<?php
include "../Database/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Guestbook Entries</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="container">
    <h1>📜 Archive of Magical Guest Entries</h1>

    <div class="scroll-box">
      <?php
      try {
          $stmt = $conn->query("SELECT * FROM entries ORDER BY date_posted DESC");

          if ($stmt->rowCount() === 0) {
              echo "<p>No entries yet in the enchanted spellbook. 🌫️</p>";
          } else {
              foreach ($stmt as $entry) {
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
          }
      } catch (PDOException $e) {
          echo "<p class='error'>Error fetching entries: " . $e->getMessage() . "</p>";
      }
      ?>
    </div>

    <div class="left-buttons">
      <a href="../pages/index.html" class="nav-button">🔙 Return to Grimoire</a>
    </div>
  </div>
</body>
</html>
