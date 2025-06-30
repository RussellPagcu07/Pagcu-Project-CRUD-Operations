<?php
include "../Database/database.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM entries WHERE id = ?");
        $stmt->execute([$id]);
        $deleted = true;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Guest Entry</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="container">
    <h1> Delete Magical Guest Entry</h1>

    <?php if (isset($deleted)): ?>
      <p class="success">🗑️ Entry deleted successfully.</p>
    <?php elseif (isset($error)): ?>
      <p class="error">⚠️ <?= $error ?></p>
    <?php else: ?>
      <p>Invalid request. No entry ID provided.</p>
    <?php endif; ?>

    <br>
    <a href="../pages/index.html" class="nav-button">🔙 Back to Entries</a>
  </div>
</body>
</html>
