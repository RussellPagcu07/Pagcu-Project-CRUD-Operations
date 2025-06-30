<?php
include "../Database/database.php"; 
date_default_timezone_set('Asia/Manila');

function displaySpecialMessage($variant) {
    echo '<div class="special-message">';
    switch ($variant) {
        case "Ardor Victor":
            echo "🔥 Feel the power and confidence of Ardor Victor!";
            break;
        case "Vir Fortis":
            echo "👑 Embrace your inner royalty with Vir Fortis.";
            break;
        case "Lux Abundantia":
            echo "💰 May Lux Abundantia bring abundance your way!";
            break;
        case "Luna Serenitas":
            echo "🌙 Peace and tranquility come with Luna Serenitas.";
            break;
        case "Amore Creatrix":
            echo "💖 Let Amore Creatrix amplify your aura and charisma!";
            break;
        default:
            echo "✨ Thank you for choosing a Magick&Spell scent!";
    }
    echo '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Guestbook Submission</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $variant = htmlspecialchars($_POST["variant"]);
    $size = htmlspecialchars($_POST["size"]);
    $quantity = (int)$_POST["quantity"];
    $message = htmlspecialchars($_POST["message"]);

    $price_per_unit = ($size === "30ml Spray") ? 199 : 99;
    $total_price = $price_per_unit * $quantity;

    $stmt = $conn->prepare("INSERT INTO entries (name, variant, size, quantity, total_price, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $variant, $size, $quantity, $total_price, $message]);

    echo "<h2>🌟 Thank you, $name, for signing our enchanted guestbook! 🌟</h2>";
    displaySpecialMessage($variant);
    echo "<div class='summary'>
            <p>🧚 Name: $name</p>
            <p>🌸 Variant: $variant</p>
            <p>📦 Size: $size</p>
            <p>🔢 Quantity: $quantity</p>
            <p>💰 Total: ₱$total_price</p>
            <p>✨ Message: $message</p>
            <p>📅 Date: " . date("F j, Y, g:i a") . "</p>
          </div>";
} else {
    echo "<p>Form not submitted correctly.</p>";
}
?>
    <br>
    <div class="left-buttons">
      <a href="index.php" class="nav-button">📜 Add Another Feedback</a>
      <a href="../pages/index.html" class="nav-button">🔙 Return to Grimoire</a>
    </div>
  </div>
</body>
</html>
