<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\OpenServer\domains\linkon-group-wp\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'linkon-group' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '/8a_7hru0P7c9YoKD`Xu?08`hiz;.k_G,-[yv{NIYi-fs/RzVpFNt*lC81*MY9i)' );
define( 'SECURE_AUTH_KEY',  '4YEmiR=_qr2JMP$ioL>}8h=F5e>)D?|vz}0CtYUh(E 5L|+674EQYgpp)<6e/vVa' );
define( 'LOGGED_IN_KEY',    '4F86bv~wV5GT)@4Gfp(ic.IpZPeH oup$;>kr~oj_,x>NBxa&xT|lGu.sWKKYSIU' );
define( 'NONCE_KEY',        'RRHucGExuRM]g2nR.Z7#7]dr,50Q1Mz}D50nCYg]4nkygR{yxfEt@0ah1JN=y>dZ' );
define( 'AUTH_SALT',        '?!e>|x>~Agd<Bq]*ETjzJk.Dx1|GfU=y2W+-@j{a;*Z_IG]#[y O077DwdLh% *P' );
define( 'SECURE_AUTH_SALT', 'Mqc$a:6T%7yFYMaYJ#zG.8hZjvh2`BuNu;m%K=4c>jr-:v7I#T+e;$><4)1b`i[i' );
define( 'LOGGED_IN_SALT',   '+5:dGvr8>p:iCa,=XTN47w4_Rgh;zF`;x{S,q%C5;,4>:`^6)O/|M;|Hc=t%mBV{' );
define( 'NONCE_SALT',       '#Ve2ihOXcE$mWB_1v@SVEB5^sLs$h};a|,/iL2Kr[DKE@.k?2ovQr.njHYP[gl$4' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
