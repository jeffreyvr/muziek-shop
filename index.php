<?php
require_once( 'includes/setup.php' );

include PARTIAL_PATH . 'header.php';
?>

<div class="container">

  <?php
  // Simple page routing
  $page = (!empty( $_GET['page'] ) ? $_GET['page'] : 'home' );

  switch ( $page ) {

    case "home":
      include PARTIAL_PATH . 'producten.php';
      break;

    case "login":
      include PARTIAL_PATH . 'login.php';
      break;

    case "over-ons":
      include PARTIAL_PATH . 'over-ons.php';
      break;

    case "product":
      include PARTIAL_PATH . 'product.php';
      break;

    case "registreren":
      include PARTIAL_PATH . 'registreren.php';
      break;

    case "winkelwagen":
      include PARTIAL_PATH . 'winkelwagen.php';
      break;

    case "afrekenen":
      include PARTIAL_PATH . 'afrekenen.php';
      break;

    default:
      include PARTIAL_PATH . '404.php';

  }
  ?>

</div>

<?php include PARTIAL_PATH . 'footer.php'; ?>
