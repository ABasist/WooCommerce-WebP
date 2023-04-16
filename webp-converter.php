<?php
/**
 * Plugin Name: WebP Converter WooCommerce
 * Plugin URI: https://github.com/ABasist/WooCommerce-WebP
 * Description: Плагин конвертирует фотографии товаров в формат WEBP
 * Version: 1.0.5
 * Author: Bonfire of the Millennials
 * Author URI: https://github.com/ABasist/WooCommerce-WebP
 * License: GPL2
 */

// подключаем класс
require_once plugin_dir_path( __FILE__ ) . 'includes/class-webp-converter.php';

// создаем экземпляр класса и запускаем плагин
add_action( 'plugins_loaded', function() {
    new WebP_Converter();
});
