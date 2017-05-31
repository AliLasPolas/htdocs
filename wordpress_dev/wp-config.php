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
define('DB_NAME', 'hairdresser');

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
define('AUTH_KEY',         'tA6(k/sa:hePmnTVbZ<O-wIoT}eHI,)@T7ksz]vP]Wr}Zq[Ulw<]2r0D52|X/_n]');
define('SECURE_AUTH_KEY',  'M2n;yO5.eWIi!H1sC9V^kj4/{:#oJJ`$!XY9z`gs*gsh~OHYP`<Ih^7~Dn_Eu/Q9');
define('LOGGED_IN_KEY',    'X`Wb0[Og%d@h[ F4N5>%/8Q3ab|#i/fa?_f[M{phi=L,J5](0iG#+4mxsb;oW]wy');
define('NONCE_KEY',        '9C}4E`8;xFIFPK^Xc%_d#tpf-[*8x_8+CrGSrM2O&(VwHlR^IbxJr:DkxPaK2A63');
define('AUTH_SALT',        'ccDHuMb3~IMAZ759mnszztNb>Bi|pHiOjF*6vXBT3>+$GCGQkU=_Rx7MigWi;}Y>');
define('SECURE_AUTH_SALT', ']Nxf=.]tRE3CLOTKlS[1?)&w6yDxwyD4.h>fe$A}?6PHhN4?M[$_W;(;1U=y]gQp');
define('LOGGED_IN_SALT',   ' yPrD2S`MURLJ I=2lTvmSR<Gs;aShIh5s GK<8-P$bfpY^x*Ns:;.?@6=NLSVtF');
define('NONCE_SALT',       'HCSa]nsz$NE-AD-fgs{jMo@QMq0viiC} v8&[s}Hg#6;pXGT~)E@v8n|{2ctG*Qh');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'hair_';

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