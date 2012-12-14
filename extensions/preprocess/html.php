<?php

/**
 * @file
 * Preprocess HTML function.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
function ultima_preprocess_html(&$vars) {
  
  // Add custom classes to the body element.
  $vars['classes_array'][] = 'ultima-theme';

  // Add URL parts to the body classes for semantic styling.
  // Be careful when substracting the base path; if the site is in root (/)
  // doing so we will remove all slashes in URL.
  // Also to avoid name clashes with existing URLs, replace only the first
  // occurrence of the base path.
  // The 'url-current-[path]' is added so we can distinguish between 'user' and
  // 'user/login' pages easily and without duplicating CSS.
  
  // Save some overhead.
  $request_uri = request_uri();
  $base_path   = base_path();
  // Get current URL without the base path and the query string.
  $current_url = explode('?', substr_replace($request_uri, '', stripos($request_uri, $base_path), strlen($base_path)));
  $url_parts = explode('/', $current_url[0]);
  switch (count($url_parts)) {
    case 1:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0];
      break;
    case 2:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0] . '-' . $url_parts[1];
      break;
    case 3:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2];
      break;
    case 4:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3];
      break;
    case 5:
      $vars['classes_array'][] = 'url-' . $url_parts[0];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3];
      $vars['classes_array'][] = 'url-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3] . '-' . $url_parts[4];
      $vars['classes_array'][] = 'url-current-' . $url_parts[0] . '-' . $url_parts[1] . '-' . $url_parts[2] . '-' . $url_parts[3] . '-' . $url_parts[4];
      break;
  }

  // Include current user roles.
  foreach ($vars['user']->roles as $rid => $role) {
    $vars['classes_array'][] = 'user-role-' . str_replace(' ', '-', strtolower($role));
  }

  // Include vocabulary ID when on term pages.
  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2)) && ($term = taxonomy_term_load(arg(2)))) {
    $vars['classes_array'][] = 'page-vocabulary-' . $term->vid;
  }

}