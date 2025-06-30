<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Magick&Spell Guestbook</title>
  <link rel="stylesheet" href="../css/styles.css" />
</head>
<body>
  <div class="container">
    <?php
      date_default_timezone_set('Asia/Manila');
      $today = date("F j, Y");
      $hour = date("H");

      if ($hour < 12) {
        $greeting = "Good morning";
      } elseif ($hour < 18) {
        $greeting = "Good afternoon";
      } else {
        $greeting = "Good evening";
      }

      echo "<h1>🪄 Magick &amp; Spell Guestbook ✨</h1>";
      echo "<p class='justified-message'>
        Welcome, wanderer of wonders! Thank you for stepping into our enchanted realm of scents and spells. We'd love to 
        hear from you. Leave a whisper of your thoughts, a flicker of your feelings, or a sprinkle of stardust below. 🌟 
      </p>";
      echo "<p class='left-align-date'>Today is $today. $greeting, dear guest! 🧙🏼‍♂️๋࣭</p>";
    ?>

    <form method="POST" action="guestbook.php">
      <label for="name">✨ Your Name (or Magical Alias):</label>
      <input type="text" id="name" name="name" required>

      <label for="variant">🔮 Favorite Potion (Scent Variant):</label>
      <select id="variant" name="variant" required>
        <option value="Ardor Victor">Ardor Victor</option>
        <option value="Vir Fortis">Vir Fortis</option>
        <option value="Lux Abundantia">Lux Abundantia</option>
        <option value="Luna Serenitas">Luna Serenitas</option>
        <option value="Amore Creatrix">Amore Creatrix</option>
      </select>

      <label>☁️ Choose Your Elixir Size:</label>
      <input type="radio" id="30ml" name="size" value="30ml Spray" required>
      <label for="30ml">30ml Spray (₱199)</label>

      <input type="radio" id="10ml" name="size" value="10ml Roll-on">
      <label for="10ml">10ml Roll-on (₱99)</label>

      <label for="quantity">🫧 Number of Bottles:</label>
      <input type="number" id="quantity" name="quantity" min="1" value="1" required>

      <label for="message">💫 Leave a Spell, Memory, or Blessing:</label>
      <textarea id="message" name="message" rows="4" required></textarea>

      <button type="submit">📜 Submit Your Scroll</button>
    </form>
  </div>
</body>
</html>
