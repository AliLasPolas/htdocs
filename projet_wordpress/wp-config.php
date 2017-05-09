<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'projet_wordpress');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+0<xiFoO|{ft%Ls?YB >Z@U8>2UzZPEM$/ot[B(ra_2|}1PW GPsR uA#pf-HUbY');
define('SECURE_AUTH_KEY',  'CxeJ09`s5bX^stDU.bd4dsAvhHH;U~!NPFA!GS9:_wK<3x@z`^Oj>J#i{.zwqE)u');
define('LOGGED_IN_KEY',    'QY+5{Hm(ailclem]a9kijB4qy<c601oJl#WSPP[T#Vk[@;U=FE9ERjg~/0BRT)uA');
define('NONCE_KEY',        'CO26f)qR=;b$<fVzaF|P=R/ejAj!&>u9>cC&1q5$Wl5c({7KJ;B~p9q?p{*|a*K6');
define('AUTH_SALT',        '2Ov`)7l D[$<W<[y:u-Q6k^]|@*S8LkhtU.&ex!vR%Rax&H_zIN%P%J3!B%Z=b4}');
define('SECURE_AUTH_SALT', 'PSx:$1a:{vYV&U)NWY/p1<%ARdedBO$1cQ$2-l*f>VC,b=:6[{ZR$/Z#<~Y%Q:Bk');
define('LOGGED_IN_SALT',   'JKo5@$^at]EQ3poOJ.P6^UxDA;=,~zjki|B)BOl]3R*K[T|jRiQAjr*OH7((g%[!');
define('NONCE_SALT',       'P+Xkr|xR,V9#l;pvA-UW&avzJ R$JMO<e1JwGm;~#E2{z AqY1p3EXaf%J_s=#U?');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');