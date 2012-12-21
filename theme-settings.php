<?php

/**
 * @file
 * Define theme settings.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implementation of hook_FORM_ID_alter().
 */
function ultima_form_system_theme_settings_alter(&$form, $form_state) {

  // Tracking scripts.
  $form['ultima_tracking'] = array(
    '#type' => 'textarea',
    '#title' => t('Tracking scripts'),
    '#description' => t('Paste here tracking code (e.g. Google Analytics, Gauge etc.).'),
    '#default_value' => theme_get_setting('ultima_tracking'),
  );

  // Copyright line.
  $form['ultima_copyright'] = array(
    '#type' => 'textfield',
    '#title' => t('Copyright'),
    '#description' => t('Copyright text to be displayed at the bottom of the page. You can use [year] token to display current year.'),
    '#default_value' => theme_get_setting('ultima_copyright'),
  );

}