README voor HAN Shop
BP van Jurrian te Loo, Jeffrey van Rossum

>> Online versie: https://vanrossumwebontwikkeling.nl/han/
>> GitHub repository: https://github.com/jeffreyvr/muziek-shop
===================================================

# INSTALLATIE & DATABASE IMPORT #
In de root staat een bestand genaamd database.sql. Deze kun je gebruiken om de database aan te maken en
data te importeren. (MySQL)

Pas indien nodig in includes/setup.php gegevens als de website-URL en de database aan.

# MAP PARTIALS #
In de partials-map staan alle templates maar ook de header en footer.

# MAP ASSETS #
Hier staan alle afbeeldingen, CSS (en) indien van toepassing JS -bestanden.

# MAP INCLUDES #
In het includes/setup.php-bestand worden enkele globale variabelen gedefiniëerd. In includes/database.php staat
een functie waarmee een database-connectie kan worden gemaakt.

In includes/functions.php staan hoofdzakelijk helper functies als han_get_producten(), han_is_gebruiker_logged_in() enzovoort.

Functions waar '_do' in de naamgeving voorkomt, zijn functies die formulieren verwerken. Bijvoorbeeld han_do_login().
