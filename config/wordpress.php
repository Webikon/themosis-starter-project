<?php

/*
|--------------------------------------------------------------------------
| Notes - README
|--------------------------------------------------------------------------
|
| You can add as many WordPress constants as you want here. Just make sure
| to add them at the end of the file or at least after the "WordPress
| authentication keys and salts" section.
|
*/

/*
|--------------------------------------------------------------------------
| WordPress authentication keys and salts
|--------------------------------------------------------------------------
|
| @link https://api.wordpress.org/secret-key/1.1/salt/
|
*/
define('AUTH_KEY',         'MQ:ib$6axe;c3E-~v.#MH&,(>^HCMBRx/>5Kood2.6~|VTe0JvY{JDTa3tRbxXME');
define('SECURE_AUTH_KEY',  '&;n|8l05LluP|^4dC5+_#7I=%Kfay$Ai|q{??5G3$K|5&6A`6PPz<~d%3Y7=yf4D');
define('LOGGED_IN_KEY',    'C)dRBd[gvouKt 3bw1NN(6E:0cT._u8qTf]f+ibYnZK&d-nSdFoo]`cG#JpH8[+/');
define('NONCE_KEY',        'j:Vhwv) S;9,.KT?bSmc+`ITd Pb{ApLn7u 7;+&rFe;T|B,=x(>pLhbP-.kNqZ,');
define('AUTH_SALT',        '&k:c7++)iH/>T&,ghjb|aJ%3i[TtzjEL9Kf[N-FK[{-.cbtD%V=v+)8:KDTq%95A');
define('SECURE_AUTH_SALT', '0KB^V$`&-NZO?,X0Ig|+La5x_GR/mFHfuw0]3,xXPs4rY@zfz!LIn|1-PeF8TW}b');
define('LOGGED_IN_SALT',   'Waot*|GNr<6#ysgP|RIi(F+gGWzj*#LDK70 :L][3]<Yuu)5Sd:|Yl)Ri|[V-wfO');
define('NONCE_SALT',       '`4^le2ZZF~%Ed/g:?g1B300ycU}j-;&J!H`8B|Kn}nN&&IYdI}>sFd;gD3t<Rebe');

/*
|--------------------------------------------------------------------------
| WordPress database
|--------------------------------------------------------------------------
*/
define('DB_NAME', config('database.connections.mysql.database'));
define('DB_USER', config('database.connections.mysql.username'));
define('DB_PASSWORD', config('database.connections.mysql.password'));
define('DB_HOST', config('database.connections.mysql.host'));
define('DB_CHARSET', config('database.connections.mysql.charset'));
define('DB_COLLATE', config('database.connections.mysql.collation'));

/*
|--------------------------------------------------------------------------
| WordPress URLs
|--------------------------------------------------------------------------
*/
define('WP_HOME', config('app.url'));
define('WP_SITEURL', config('app.wp.url'));
define('WP_CONTENT_URL', WP_HOME.'/'.CONTENT_DIR);

/*
|--------------------------------------------------------------------------
| WordPress debug
|--------------------------------------------------------------------------
*/
define('SAVEQUERIES', config('app.debug'));
define('WP_DEBUG', config('app.debug'));
define('WP_DEBUG_DISPLAY', config('app.debug'));
define('SCRIPT_DEBUG', config('app.debug'));

/*
|--------------------------------------------------------------------------
| WordPress auto-update
|--------------------------------------------------------------------------
*/
define('WP_AUTO_UPDATE_CORE', false);

/*
|--------------------------------------------------------------------------
| WordPress file editor
|--------------------------------------------------------------------------
*/
define('DISALLOW_FILE_EDIT', true);

/*
|--------------------------------------------------------------------------
| WordPress default theme
|--------------------------------------------------------------------------
*/
define('WP_DEFAULT_THEME', 'themosis-starter-theme');

/*
|--------------------------------------------------------------------------
| Application Text Domain
|--------------------------------------------------------------------------
*/
define('APP_TD', env('APP_TD', 'themosis-starter-project'));

/*
|--------------------------------------------------------------------------
| JetPack
|--------------------------------------------------------------------------
*/
define('JETPACK_DEV_DEBUG', config('app.debug'));
