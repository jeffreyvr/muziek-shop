
<?php if ( ! han_is_gebruiker_logged_in() ) : ?>

  <form method="post">

    <div class="form-group form-group-inline">
      <input type="text" placeholder="Gebruikersnaam" name="gebruikersnaam">
    </div>

    <div class="form-group form-group-inline">
      <input type="password" placeholder="Wachtwoord" name="wachtwoord">
    </div>

    <input type="hidden" name="form_action" value="login">

    <button type="submit">Log in</button>
  </form>

  <a href="index.php?page=registreren">Registreren</a>

<?php else : ?>

  <p>Je bent ingelogd als <?php echo $_SESSION['gebruikersnaam']; ?></p>

  <form method="post">
    <input type="hidden" name="form_action" value="logout">
    <button type="submit">Uitloggen</button>
  </form>

<?php endif; ?>
