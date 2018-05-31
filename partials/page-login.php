
<?php if ( ! han_is_gebruiker_logged_in() ) : ?>

  <form method="post">

    <div class="form-group">
      <label for="gebruikersnaam">Gebruikersnaam</label>
      <input type="text" name="gebruikersnaam" id="gebruikersnaam">
    </div>

    <div class="form-group">
      <label for="wachtwoord">Wachtwoord</label>
      <input type="text" name="wachtwoord" id="wachtwoord">
    </div>

    <input type="hidden" name="form_action" value="login">

    <button type="submit">Log in</button>
  </form>

<?php else : ?>

  <p>Je bent ingelogd als <?php echo $_SESSION['gebruikersnaam']; ?></p>

  <form method="post">
    <input type="hidden" name="form_action" value="logout">
    <button type="submit">Uitloggen</button>
  </form>

<?php endif; ?>
