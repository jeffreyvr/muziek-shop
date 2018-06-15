<?php
  $arguments = [];

  if ( !empty( $_GET['category'] ) ) {
    $arguments['category'] = han_get_category_query();
  }

  if ( han_get_search_query() ) {
    $arguments['search'] = han_get_search_query();
  }

  if ( $paged = han_get_paged_query() ) {
    $offset = $config['site']['items_per_page'] * ($paged-1);
    $arguments['offset'] = $offset;
  }

  $producten = han_get_producten( $arguments );

  $page_arguments = array_merge( $arguments, ['offset'=>0,'limit'=>999 ] );

  $total = han_get_producten( $page_arguments, true );
?>

<?php if ( han_get_search_query() ) { ?>
  <h1>Zoekresultaten voor "<?php echo han_get_search_query(); ?>"</h1>
<?php } elseif ( han_get_category_query() ) { ?>
  <h1>Categorie: <?php echo ucfirst( han_get_category_query() ); ?></h1>
<?php } ?>

<!-- Start Producten -->
<div class="flex-grid products">

  <?php if ( !empty( $producten ) ) { ?>

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

    <?php echo han_get_product_pagination($total); ?>

  <?php } else { ?>

    <p>Geen producten gevonden.</p>

  <?php } ?>

</div>
<!-- Eind Producten -->
