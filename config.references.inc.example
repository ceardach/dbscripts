<?php

/**
 * Mapping References
 */

// Tables that do NOT have references elsewhere
// Make sure these are tables you are sure will never be referenced because there will
//    be no error checking.  If you are unsure, then place this in $tables_referenced
//    and set 'false positives'
$tables_standalone = array(
  'access',
  'advanced_help_index',
  'authmap',
  'batch',
  'boxes',
  'contact',
  'filters', // references are to filter_formats.format
  'permission',
  'url_alias',
  'blogapi_files', // this should not have auto_increment on fid, since it is files.fid (or at least should be)
);



// Tables that are referenced by other tables
// Error checking will be performed against this array to ensure no additional
//    possibilies were added
// You may also add new associations even if they are not brought up automatically
//
// POSSIBLE WILD CARDS
// table_.*
// table_name_.*
// long_table_name_.*
// field_*
// field_*_type
$tables_referenced = array(

  'actions_aid' => array(
    'references' => array(
      'actions' => array('aid'),
      'trigger_assignments' => array('aid'),
    ),
    'false positives' => array(
    ),
  ),

  'aggregator_category' => array(
    'references' => array(
      'aggregator_category_feed' => array('cid'),
    ),
    'false positives' => array (
      'webform_component' => array('cid'),
      'webform_submitted_data' => array('cid',),
    ),
  ),

  'aggregator_feed' => array(
    'references' => array(
      'aggregator_category_feed' => array('fid'),
    ),
    'false positives' => array (
      'content_field_.*' => array('field_*_fid'),
      'content_type_.*' => array('field_*_fid'),
      'image' => array('fid'),
      'profile_values' => array('fid'),
      'upload' => array('fid'),
    ),
  ),

  'blocks' => array(
    'references' => array(
      // Boxes will not show up when searching for references
      //    because boxes.bid is set as auto_increment.
      // It shouldn't have auto_increment, though...
      'boxes' => array('bid'),
    ),
    'false positives' => array (
      'book' => array('bid'),
    ),
  ),

  'files' => array(
    'references' => array(
      'content_field_.*' => array('field_*_fid'),
      'content_type_.*' => array('field_*_fid'),
      'image' => array('fid'),
      'upload' => array('fid'),
    ),
    'false positives' => array (
      'aggregator_category_feed' => array('fid'),
      'profile_values' => array('fid'),
    ),
  ),

  'filter_formats' => array(
    'references' => array(
      'better_formats_defaults' => array('format'),
      'boxes' => array('format'),
      'content_field_.*' => array('field_*_format'),
      'content_type_.*' => array('field_*_format'),
      'filters' => array('format'),
      'node_revisions' => array('format'),
      'wysiwyg' => array('format'),
    ),
    'false positives' => array (
    ),
  ),

  'imagecache_preset' => array(
    'references' => array(
      'imagecache_action' => array('presetid'),
    ),
    'false positives' => array (
    ),
  ),

  'locales_source' => array(
    'references' => array(
      'locales_target' => array('lid', 'plid'),
    ),
    'false positives' => array (
      'book' => array('mlid'),
      'menu_links' => array('plid' ),
      'webform' => array('additional_validate' ),
    ),
  ),

  'menu_links' => array(
    'references' => array(
      'book' => array('mlid'),
      'menu_links' => array('plid'),
    ),
    'false positives' => array (
    ),
  ),

  'node' => array(
    'references' => array(
      'book' => array('nid'),
      'content_field_.*' => array('nid', 'field_*_nid'),
      'content_type_.*' => array('nid', 'field_*_nid'),
      'forum' => array('nid'),
      'image' => array('nid'),
      'image_attach' => array('nid'),
      'img_assist_map' => array('nid', 'iid'),
      'node_access' => array('nid'),
      'node_revisions' => array('nid'),
      'poll' => array('nid'),
      'poll_choices' => array('nid'),
      'term_node' => array('nid'),
      'upload' => array('nid'),
      'webform' => array('nid'),
      'webform_component' => array('nid'),
      'webform_roles' => array('nid'),
      'webform_submissions' => array('nid'),
      'webform_submitted_data' => array('nid'),
    ),
    'false positives' => array (
      'content_field_.*' => array('field_*_fid', 'field_*_list', 'field_*_data'),
      'content_type_.*' => array('field_*_fid', 'field_*_list', 'field_*_data'),
      'node' => array('tnid'),
    ),
  ),

  'node_revisions' => array(
    'references' => array(
      'content_field_.*' => array('vid'),
      'content_type_.*' => array('vid'),
      'forum' => array('vid'),
      'node' => array('vid'),
      'term_node' => array('vid'),
      'upload' => array('vid'),
    ),
    'false positives' => array (
      // I can't think of a case where a field would refer to a revision
      'content_field_.*' => array('field_*'),
      'content_type_.*' => array('field_*'),
      'term_data' => array('vid'),
      'views_display' => array('vid'),
      'vocabulary_node_types' => array('vid'),
    ),
  ),

  'profile_fields' => array(
    'references' => array(
      'profile_values' => array('fid'),
    ),
    'false positives' => array (
      'aggregator_category_feed' => array('fid'),
      // We can safely assume all fid will refer to files.fid and not this table
      'content_field_.*' => array('field_*'),
      'content_type_.*' => array('field_*'),
      'image' => array('fid'),
      'upload' => array('fid'),
    ),


  ),

  'role' => array(
    'references' => array(
      'better_formats_defaults' => array('rid'),
      'blocks_roles' => array('rid'),
      'permission' => array('rid'),
      'users_roles' => array('rid'),
      'webform_roles' => array('rid'),
    ),
    'false positives' => array (
    ),
  ),

  'term_data' => array(
    'references' => array(
      'forum' => array('tid'),
      'permission' => array('tid'),
      'term_hierarchy' => array('tid'),
      'term_node' => array('tid'),
      'term_relation' => array('tid1', 'tid2'),
      'term_synonym' => array('tid'),
    ),
    'false positives' => array (
      'imagecache_action' => array('presetid'),
    ),
  ),

  'users' => array(
    'references' => array(
      'authmap' => array('uid'),
      'blogapi_files' => array('uid'),
      'files' => array('uid'),
      'node' => array('uid'),
      'node_revisions' => array('uid'),
      'profile_values' => array('uid'),
      'users_roles' => array('uid'),
      'webform_submissions' => array('uid'),
    ),
    'false positives' => array (
    ),
  ),

  'views_view' => array(
    'references' => array(
      'views_display' => array('vid'),
    ),
    'false positives' => array (
      // Not filtering field_* because it could want field_*_vid for referencing views
      'content_field_.*' => array('vid', 'field_*_nid', 'field_*_fid', 'field_*_list', 'field_*_data'),
      'content_type_.*' => array('vid', 'field_*_nid', 'field_*_fid', 'field_*_list', 'field_*_data'),
      'forum' => array('vid'),
      'node' => array('vid'),
      'term_data' => array('vid'),
      'term_node' => array('vid'),
      'upload' => array('vid'),
      'vocabulary_node_types' => array('vid'),
    ),


  ),

  'vocabulary' => array(
    'references' => array(
      'vocabulary_node_types' => array('vid'),
    ),
    'false positives' => array (
      // Not filtering field_* because it could want field_*_vid for referencing vocabularies
      'content_field_.*' => array('vid', 'field_*_nid', 'field_*_fid', 'field_*_list', 'field_*_data'),
      'content_type_.*' => array('vid', 'field_*_nid', 'field_*_fid', 'field_*_list', 'field_*_data'),
      'forum' => array('vid'),
      'node' => array('vid'),
      'term_data' => array('vid'),
      'term_node' => array('vid'),
      'upload' => array('vid'),
      'views_display' => array('vid'),
    ),
  ),

  'webform_submissions' => array(
    'references' => array(
      'webform_submitted_data' => array('sid'),
    ),
    'false positives' => array (
    ),
  ),

);



// System paths that have to be updated
// The wildcard '*' symbolizes that table's primary key
//
// You will have to manually edit this for every custom view
$system_paths = array(
  'node' => array(
    'patterns' => array('node/*', 'node/*/edit'),
    'tables' => array(
      'menu_links' => array('link_path', 'router_path'),
      'menu_router' => array('path', 'tab_parent', 'tab_root'),
      'url_alias' => array('src'),
    ),
  ),

  'term_data' => array(
    'patterns' => array('taxonomy/term/*'),
    'tables' => array(
      'url_alias' => array('src'),
    ),
  ),

  'users' => array(
    'patterns' => array('user/*'),
    'tables' => array(
      'url_alias' => array('src'),
    ),
  ),
);