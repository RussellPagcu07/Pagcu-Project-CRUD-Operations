<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You – Magick&Spell Guestbook</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <?php
    date_default_timezone_set('Asia/Manila');

    // Function to save the guest entry to a text file
    function saveGuestEntry($entry) {
        $file = fopen("guestbook_entries.txt", "a") or die("Unable to open file!");
        fwrite($file, $entry . "\n");
        fclose($file);
    }

    // Function to display a special message based on the variant
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

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $variant = htmlspecialchars($_POST["variant"]);
        $size = htmlspecialchars($_POST["size"]);
        $quantity = (int)$_POST["quantity"];
        $message = htmlspecialchars($_POST["message"]);
        $date = date("F j, Y, g:i a");

        // Determine the price based on size
        $price_per_unit = ($size === "30ml Spray") ? 199 : 99;
        $total_price = $price_per_unit * $quantity;

        // Create a formatted entry
        $entry = "Name: $name | Variant: $variant | Size: $size | Quantity: $quantity | Total: ₱$total_price | Message: $message | Date: $date";

        // Save the entry to the file
        saveGuestEntry($entry);

        // Display a special message based on the variant
        displaySpecialMessage($variant);

        echo "<h2>🌟 Thank you, $name, for signing our guestbook! 🌟</h2>";

        // Display all previous entries using a loop
        echo "<h3>✨ Previous Guests ✨</h3>";
        $file = fopen("guestbook_entries.txt", "r") or die("Unable to open file!");
        while (($line = fgets($file)) !== false) {
            echo "<div class='summary'><p>$line</p></div>";
        }
        fclose($file);
    } else {
        echo "<p>Form not submitted correctly.</p>";
    }
    ?>
  </div>
</body>
</html>
