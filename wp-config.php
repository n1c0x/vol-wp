<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 * 
 * Ce fichier contient les configurations suivantes :
 * 
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php 
 * 
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'vol-wp');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '0){>Gs&:aT`CAl5IEDI+b<A{n:Fx m.q0gR/[)B8{++0ZK5(F/,W>G~.nI4^ng%#');
define('SECURE_AUTH_KEY', 'Ez=jf|wS5-D-7WNcm~8u3UEB_Y_8S+h9y;o[m)yBB6}$oL#Q%^|3_-mLK)5+%/pO');
define('LOGGED_IN_KEY', 'T9=wChdo{[[0K+ B;: z|RQuvot]~a2#AQ]hK/i=e(u@#1SPUzKiusm81f]_.ri2');
define('NONCE_KEY', 'cU}|%?GjJ/xxTHD^Uv7SCc!x[6g$nXA+a4{%+R!sq&S5pjC(T1X(1+*:-: Q_Z:>');
define('AUTH_SALT', 'rlb0P}C=(tgHFk),u&y#`Q1|52]pLy]XeN+[k<5@$~`[+X&:||9 !P2JCOYGX0k4');
define('SECURE_AUTH_SALT', '|!-nKM|adw(Sxs_4B)v{4)%$}wqlF_tSF?iPv30KI[6:H[>PMWh(48Aqb(5V(*s$');
define('LOGGED_IN_SALT', '|#-8l[HD&.wF!g;=Kfw Ws2r4I-GNaS.a(>H@H8yF_/0$fP5->3^!v =FK;NN]-W');
define('NONCE_SALT', '8Z<Hz46k~2B+e=.,.+Qr,|`!1EIVqN@+ZL3N+[Hit}n)1DeH-.>[+_{?E#p5jMV/');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode déboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 * 
 * Pour obtenir plus d'information sur les constantes 
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */ 
define('WP_DEBUG', false); 


 /** Désactivation des révisions d'articles */
define('WP_POST_REVISIONS', 0);

 /** Désactivation de l'éditeur de thème et d'extension */
define('DISALLOW_FILE_EDIT', true);

 /** Intervalle des sauvegardes automatique */
define('AUTOSAVE_INTERVAL', 7200);

 /** On augmente la mémoire limite */
define('WP_MEMORY_LIMIT', '96M');

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');