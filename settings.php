<?php

// Защита от прямого доступа к файлу
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class WebP_Converter_Admin_Page {

  /**
   * Инициализация страницы настроек
   */
  public function init() {
    add_action( 'admin_menu', array( $this, 'add_admin_page' ) );
    add_action( 'admin_init', array( $this, 'register_settings' ) );
  }

  /**
   * Добавление страницы настроек в админ-панель
   */
  public function add_admin_page() {
    add_submenu_page(
      'woocommerce',
      __( 'WebP Converter Settings', 'webp-converter' ),
      __( 'WebP Converter', 'webp-converter' ),
      'manage_options',
      'webp-converter',
      array( $this, 'settings_page' )
    );
  }

  /**
   * Отображение страницы настроек
   */
  public function settings_page() {
    ?>
    <div class="wrap">
      <h1><?php esc_html_e( 'WebP Converter Settings', 'webp-converter' ); ?></h1>
      <form action="options.php" method="post">
        <?php settings_fields( 'webp_converter_settings' ); ?>
        <?php do_settings_sections( 'webp_converter_settings' ); ?>
        <table class="form-table">
          <tbody>
            <tr>
              <th scope="row">
                <label for="webp_converter_enabled"><?php esc_html_e( 'Enable WebP Conversion', 'webp-converter' ); ?></label>
              </th>
              <td>
                <input type="checkbox" id="webp_converter_enabled" name="webp_converter_enabled" value="1" <?php checked( get_option( 'webp_converter_enabled' ), 1 ); ?>>
                <label for="webp_converter_enabled"><?php esc_html_e( 'Enable WebP conversion for product images', 'webp-converter' ); ?></label>
              </td>
            </tr>
          </tbody>
        </table>
        <?php submit_button(); ?>
      </form>
    </div>
    <?php
  }

  /**
   * Регистрация настроек
   */
  public function register_settings() {
    register_setting( 'webp_converter_settings', 'webp_converter_enabled' );
  }

}

// Инициализация страницы настроек
$webp_converter_admin_page = new WebP_Converter_Admin_Page();
$webp_converter_admin_page->init();
