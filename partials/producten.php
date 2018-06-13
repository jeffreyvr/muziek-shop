<!-- Start Producten -->
<div class="flex-grid products">

  <?php
    $arguments = [];

    if ( !empty( $_GET['category'] ) ) {
      $arguments['category'] = $_GET['category'];
    }

    if ( !empty( $_GET['search'] ) ) {
      $arguments['search'] = $_GET['search'];
    }

    $producten = han_get_producten( $arguments );
  ?>

  <?php foreach( $producten as $product ) { ?>

    <!-- Start Product <?php echo $product['PRODUCTNUMMER']; ?> -->
    <article class="col product-item">
      <a href="index.php?page=product&amp;productnummer=<?php echo $product['PRODUCTNUMMER']; ?>"></a>
      <img src="<?php echo $product['AFBEELDING_KLEIN']; ?>" alt="<?php echo $product['PRODUCTNAAM']; ?>">
      <h3><?php echo $product['PRODUCTNAAM']; ?></h3>
      <strong class="price"><?php echo han_format_price( $product['PRIJS'] ); ?></strong>
    </article>
    <!-- Eind Product <?php echo $product['PRODUCTNUMMER']; ?> -->

  <?php } ?>

</div>
<!-- Eind Producten -->
