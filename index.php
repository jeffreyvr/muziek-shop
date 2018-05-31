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
      include PARTIAL_PATH . 'page-home.php';
      break;

    case "login":
      include PARTIAL_PATH . 'page-login.php';
      break;

    case "test":
      include PARTIAL_PATH . 'page-test.php';
      break;

    default:
      include PARTIAL_PATH . 'page-404.php';

  }
  ?>

</div>

<?php include PARTIAL_PATH . 'footer.php'; ?>
