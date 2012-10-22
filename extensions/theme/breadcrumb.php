<?php

/**
 * @file
 * Theme breadcrumb function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

/**
 * Implements theme_breadcrumb().
 */
function ultima_breadcrumb(&$vars) {
  
  $breadcrumb = $vars['breadcrumb'];

  if (!empty($breadcrumb)) {

    // Used for dynamically including the current page title
    $include_title = TRUE;

    $title = '';
    if ($include_title) {
      // Include current page's title
      $title  = '<span class="divider">&raquo;</span></li>';
      $title .= '<li class="active">' . drupal_get_title() . '</li>';
    }

    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output  = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    
    // Implode the breadcrumbs
    $output .= '<ul class="breadcrumb"><li>' . implode('<span class="divider">»</span></li><li>', $breadcrumb) . $title.'</ul>';

    return $output;
  }

}
