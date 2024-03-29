<?php
/**
* Plugin Name: Buildout SEO Support
* Plugin URI: https://github.com/buildoutinc/wordpress-seo-plugin
* Description: Allows Google to better crawl the Buildout plugin
* Version: 1.1.0
* Author: Buildout
* License: GPL2
*/


function custom_rewrite_basic() {
  $root_inventory_path = get_option( 'buildout_seo_setting_root_path' );
  $root_inventory_path = trim($root_inventory_path, '/');
  add_rewrite_rule('^' . $root_inventory_path . '/.*', 'index.php?page_id=' . get_option( 'buildout_seo_setting_plugin_page_id' ), 'top');

  $root_broker_path = get_option( 'buildout_seo_setting_broker_root_path' );
  $root_broker_path = trim($root_broker_path, '/');
  add_rewrite_rule('^' . $root_broker_path . '/.*', 'index.php?page_id=' . get_option( 'buildout_seo_setting_broker_plugin_page_id' ), 'top');
}
add_action('init', 'custom_rewrite_basic');

// ------------------------------------------------------------------
// Add sections, fields and settings during admin_init
// ------------------------------------------------------------------
function buildout_seo_section_callback_function() {
  echo '<p>Configure the settings for Buildout SEO</p>';
}

function buildout_seo_setting_section_callback_function() {
  $input = '<input name="buildout_seo_setting_root_path" id="buildout_seo_setting_root_path" type="text" value="' . get_option( 'buildout_seo_setting_root_path' ) . '" />';
  $input .= '<p class="description">The path that the plugin is installed at, like <code>/properties</code></p>';
  echo $input;
}

function buildout_seo_setting_plugin_page_id_function() {
  $input = '<input name="buildout_seo_setting_plugin_page_id" id="buildout_seo_setting_plugin_page_id" type="number" value="' . get_option( 'buildout_seo_setting_plugin_page_id' ) . '" />';
  $input .= '<p class="description">The page id that the plugin is installed at</p>';
  echo $input;
}

function buildout_seo_broker_path_callback_function() {
  $input = '<input name="buildout_seo_setting_broker_root_path" id="buildout_seo_setting_broker_root_path" type="text" value="' . get_option( "buildout_seo_setting_broker_root_path" ) . '" />';
  $input .= '<p class="description">The path that the broker plugin is installed at, like <code>/properties</code></p>';
  echo $input;
}

function buildout_seo_setting_broker_plugin_page_id_function() {
  $input = '<input name="buildout_seo_setting_broker_plugin_page_id" id="buildout_seo_setting_broker_plugin_page_id" type="number" value="' . get_option( "buildout_seo_setting_broker_plugin_page_id" ) . '" />';
  $input .= '<p class="description">The page id that the broker plugin is installed at</p>';
  echo $input;
}

function buildout_seo_settings_init() {
  // Add the section to general settings
  add_settings_section(
    'buildout_seo_setting_section',
    'Buildout SEO',
    'buildout_seo_section_callback_function',
    'general'
  );

  // Add the config fields
  add_settings_field(
    'buildout_seo_setting_root_path',
    'Inventory Plugin Path',
    'buildout_seo_setting_section_callback_function',
    'general',
    'buildout_seo_setting_section'
  );

  add_settings_field(
    'buildout_seo_setting_plugin_page_id',
    'Inventory Plugin Page Id',
    'buildout_seo_setting_plugin_page_id_function',
    'general',
    'buildout_seo_setting_section'
  );

  add_settings_field(
    'buildout_seo_setting_broker_root_path',
    'Broker Plugin Path',
    'buildout_seo_broker_path_callback_function',
    'general',
    'buildout_seo_setting_section'
  );

  add_settings_field(
    'buildout_seo_setting_broker_plugin_page_id',
    'Broker Plugin Page Id',
    'buildout_seo_setting_broker_plugin_page_id_function',
    'general',
    'buildout_seo_setting_section'
  );

  // Register our setting so that $_POST handling is done for us and
  // our callback function just has to echo the <input>
  register_setting( 'general', 'buildout_seo_setting_root_path' );
  register_setting( 'general', 'buildout_seo_setting_plugin_page_id' );
  register_setting( 'general', 'buildout_seo_setting_broker_root_path' );
  register_setting( 'general', 'buildout_seo_setting_broker_plugin_page_id' );
}

add_action( 'admin_init', 'buildout_seo_settings_init' );

