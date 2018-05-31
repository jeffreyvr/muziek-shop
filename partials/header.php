<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Webshop</title>
  <link href="assets/css/style.css" rel="stylesheet" media="screen">
</head>

<body>

  <header>
    <div class="site-title">HAN Shop</div>

    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=test">Test</a></li>
        <li><a href="index.php?page=login"><?php echo ( han_is_gebruiker_logged_in() ? 'Uitloggen' : 'Inloggen' ); ?></a></li>
      </ul>
    </nav>

  </header>

  <main>
