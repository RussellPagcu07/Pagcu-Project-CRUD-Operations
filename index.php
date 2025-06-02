<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Magick&Spell Guestbook</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="container">
    <?php
      // Set the correct timezone
      date_default_timezone_set('Asia/Manila');

      // Get the current date
      $today = date("F j, Y");

      // Determine the greeting based on time
      $hour = date("H");
      if ($hour < 12) {
        $greeting = "Good morning";
      } elseif ($hour < 18) {
        $greeting = "Good afternoon";
      } else {
        $greeting = "Good evening";
      }

      echo "<h1>🪄 Magick&amp;Spell&nbsp;Guestbook 🔮</h1>";
      echo "<p>Today is $today.</p>";
      echo "<p>$greeting, dear guest! 🌟</p>";
    ?>

    <form method="POST" action="guestbook.php">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="variant">Favorite Variant:</label>
      <select id="variant" name="variant" required>
        <option value="Ardor Victor">Ardor Victor</option>
        <option value="Vir Fortis">Vir Fortis</option>
        <option value="Lux Abundantia">Lux Abundantia</option>
        <option value="Luna Serenitas">Luna Serenitas</option>
        <option value="Amore Creatrix">Amore Creatrix</option>
      </select>

      <label>Size:</label>
      <input type="radio" id="30ml" name="size" value="30ml Spray" required>
      <label for="30ml">30ml Spray (₱199)</label>

      <input type="radio" id="10ml" name="size" value="10ml Roll-on">
      <label for="10ml">10ml Roll-on (₱99)</label>

      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" name="quantity" min="1" value="1" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" required></textarea>

      <button type="submit">Submit Message</button>
    </form>
  </div>
</body>
</html>