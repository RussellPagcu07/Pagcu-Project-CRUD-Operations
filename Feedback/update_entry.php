<?php
include "../Database/database.php";

$success = isset($_GET['success']) && $_GET['success'] == "1";
$error = null;
$entry = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = $_POST["id"];
    $name = htmlspecialchars($_POST["name"]);
    $variant = $_POST["variant"];
    $size = $_POST["size"];
    $quantity = (int)$_POST["quantity"];
    $message = htmlspecialchars($_POST["message"]);
    $price_per_unit = ($size === "30ml Spray") ? 199 : 99;
    $total_price = $price_per_unit * $quantity;

    try {
        $stmt = $conn->prepare("UPDATE entries SET name = ?, variant = ?, size = ?, quantity = ?, message = ?, total_price = ? WHERE id = ?");
        $stmt->execute([$name, $variant, $size, $quantity, $message, $total_price, $id]);

        header("Location: update_entry.php?success=1");
        exit();
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM entries WHERE id = ?");
    $stmt->execute([$id]);
    $entry = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Guest Entry</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="container">

    <?php if ($success): ?>
      <h1>Scroll Successfully Updated!</h1>
      <p class="success">Your magical guest entry has been updated successfully. ✨</p>
      <div class="nav-button-group">
        <a href="show_entries.php" class="nav-button">📜 View All Entries</a>
        <a href="../pages/index.html" class="nav-button">🔙 Return to Grimoire</a>
      </div>

    <?php elseif ($error): ?>
      <h1>📝 Update Magical Guest Entry</h1>
      <p class="error">⚠️ <?= $error ?></p>

    <?php elseif ($entry): ?>
      <h1>📝 Update Magical Guest Entry</h1>
      <form method="POST" action="update_entry.php">
        <input type="hidden" name="id" value="<?= $entry['id'] ?>">

        <label for="name">✨ Your Name:</label>
        <input type="text" id="name" name="name" value="<?= $entry['name'] ?>" required>

        <label for="variant">🔮 Potion Variant:</label>
        <select id="variant" name="variant" required>
          <?php
          $variants = ["Ardor Victor", "Vir Fortis", "Lux Abundantia", "Luna Serenitas", "Amore Creatrix"];
          foreach ($variants as $v) {
              $selected = ($entry['variant'] === $v) ? "selected" : "";
              echo "<option value=\"$v\" $selected>$v</option>";
          }
          ?>
        </select>

        <label>☁️ Elixir Size:</label>
        <input type="radio" id="30ml" name="size" value="30ml Spray" <?= ($entry['size'] === "30ml Spray") ? "checked" : "" ?>>
        <label for="30ml">30ml Spray (₱199)</label>

        <input type="radio" id="10ml" name="size" value="10ml Roll-on" <?= ($entry['size'] === "10ml Roll-on") ? "checked" : "" ?>>
        <label for="10ml">10ml Roll-on (₱99)</label>

        <label for="quantity">🫧 Bottles:</label>
        <input type="number" id="quantity" name="quantity" value="<?= $entry['quantity'] ?>" min="1" required>

        <label for="message">💫 Message:</label>
        <textarea id="message" name="message" rows="4" required><?= $entry['message'] ?></textarea>

        <button type="submit">🌟 Update Scroll</button>
      </form>

      <div class="nav-button-group">
        <a href="../pages/index.html" class="nav-button">🔮 Return to Grimoire</a>
      </div>
    <?php else: ?>
      <h1>📝 Update Magical Guest Entry</h1>
      <p class="error">⚠️ No entry found for ID <?= htmlspecialchars($_GET['id'] ?? '') ?>.</p>
      <div class="nav-button-group">
        <a href="../pages/index.html" class="nav-button">🔮 Return to Grimoire</a>
      </div>
    <?php endif; ?>

  </div>
</body>
</html>
