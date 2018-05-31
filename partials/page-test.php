<h1>Voorbeeld gebruikers foreach</h1>

<?php $gebruikers = han_get_gebruikers(); ?>

<?php foreach( $gebruikers as $gebruiker ) : ?>

  <?php echo $gebruiker['GEBRUIKERSNAAM']; ?><br>

<?php endforeach; ?>

<h1>Totale gebruikers response</h1>
<pre>
  <?php print_r( $gebruikers ); ?>
</pre>

<h1>Get gebruiker by gebruikersnaam</h1>

<pre><?php print_r( han_get_gebruiker_by_gebruikersnaam('jurrian') ); ?></pre>
