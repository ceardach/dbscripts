<?php

/**
 * Mapping References
 */

// Tables that do NOT have references elsewhere
//
// Make sure these are tables you are sure will never be referenced because
// there will be no error checking.  If you are unsure, then place this in
// $tables_referenced and set 'false positives'

$tables_standalone = array(
  'access',
  'advanced_help_index',
  'authmap',
  'batch',
  'blogapi_files', // this should not have auto_increment on fid, since it is
                   // files.fid (or at least should be)
  'boxes',
  'contact',
  'filters', // references are to filter_formats.format
  'path_redirect',
  'permission',
  'url_alias',
  'workflow_access', // shouldn't have auto_increment on sid
  'workflow_node_history',
  'workflow_transitions',
);



// Tables that are referenced by other tables
//
// Error checking will be performed against this array to ensure no additional
// possibilies were added. You may also (and may need to) add new associations
// even if they are not brought up automatically.
//
// POSSIBLE WILD CARDS
// table_.*
// table_name_.*
// long_table_name_.*
// field_*
// field_*_type
//
// DEPENDANCIES
// In rare occasions, the meaning of an id in one column depends upon the value
// in another column of the same table.  For example, in the flag module, the
// column "content_id" holds values that could be referencing nodes, comments
// or users.  Which one depends upon the value of the "content_type" column.
//
// You can express these dependencies by making the column value of the
// reference an array, in which is the depenant column value, and the column
// that contains the id with an astrick symbolizing the value to change.
// For example:
//
// 'flag_content' => array(array('content_type' => 'comment', 'content_id' => '*'))
// 'flag_content' => array(array('content_type' => 'node', 'content_id' => '*'))
// 'flag_content' => array('uid', array('content_type' => 'user', 'content_id' => '*'))
//
// Each table can only have one instance of this type of dependency.
// You CANNOT use wildcards when defining any values for dependancies.

$tables_referenced = array(

  'actions_aid' => array(
    'references' => array(
      'actions' => array('aid'),
      'trigger_assignments' => array('aid'),
    ),
    'false positives' => array(
      'flag_actions' => array('aid'),
    ),
  ),

  'aggregator_category' => array(
    'references' => array(
      'aggregator_category_feed' => array('cid'),
    ),
    'false positives' => array(
      'biblio_collection' => array('cid'),
      'biblio_collection_type' => array('cid'),
      'biblio_contributor' => array('cid'),
      'webform_component' => array('cid'),
      'webform_submitted_data' => array('cid',),
    ),
  ),

  'aggregator_feed' => array(
    'references' => array(
      'aggregator_category_feed' => array('fid'),
    ),
    'false positives' => array(
      'biblio_field_type' => array('fid'),
      'biblio_fields' => array('fid'),
      'content_field_.*' => array('field_*_fid'),
      'content_type_.*' => array('field_*_fid'),
      'image' => array('fid'),
      'profile_values' => array('fid'),
      'upload' => array('fid'),
    ),
  ),

  'biblio_contributor_data' => array(
    'references' => array(
      'biblio_contributor' => array('cid'),
    ),
    'false positives' => array(
      'aggregator_category_feed' => array('cid'),
      'biblio_collection' => array('cid'),
      'biblio_collection_type' => array('cid'),
    ),
  ),

  'biblio_contributor_type_data' => array(
    'references' => array(
      'biblio_contributor' => array('auth_type'),
      'biblio_contributor_type' => array('auth_type'),
    ),
    'false positives' => array(
    ),
  ),

  'biblio_keyword_data' => array(
    'references' => array(
      'biblio_keyword' => array('kid'),
    ),
    'false positives' => array(
    ),
  ),

  'blocks' => array(
    'references' => array(
      // Boxes will not show up when searching for references
      //    because boxes.bid is set as auto_increment.
      // It shouldn't have auto_increment, though...
      'boxes' => array('bid'),
    ),
    'false positives' => array(
      'book' => array('bid'),
    ),
  ),

  'comments' => array(
    'references' => array(
      'flag_content' => array(array('content_type' => 'comment', 'content_id' => '*')),
    ),
    'false positives' => array(
      'aggregator_category_feed' => array('cid'),
      'biblio_collection' => array('cid'),
      'biblio_collection_type' => array('cid'),
      'biblio_contributor' => array('cid'),
      'aggregator_contributor' => array('cid'),
    ),
  ),

  'faceted_search_env' => array(
    'references' => array(
      'faceted_search_filters' => array('env_id'),
    ),
    'false positives' => array(
    ),
  ),

  'files' => array(
    'references' => array(
      'content_field_.*' => array('field_*_fid'),
      'content_type_.*' => array('field_*_fid'),
      'image' => array('fid'),
      'upload' => array('fid'),
    ),
    'false positives' => array(
      'aggregator_category_feed' => array('fid'),
      'profile_values' => array('fid'),
      'biblio_field_type' => array('fid'),
      'biblio_fields' => array('fid'),
      'flag_actions' => array('fid'),
      'flag_content' => array('fid'),
      'flag_counts' => array('fid'),
      'flag_types' => array('fid'),
    ),
  ),

  'filter_formats' => array(
    'references' => array(
      'better_formats_defaults' => array('format'),
      'boxes' => array('format'),
      'comments' => array('format'),
      'content_field_.*' => array('field_*_format'),
      'content_type_.*' => array('field_*_format'),
      'filters' => array('format'),
      'node_revisions' => array('format'),
      'wysiwyg' => array('format'),
    ),
    'false positives' => array(
      'date_format' => array('format'),
      'date_format_locale' => array('format'),
      'simplenews_newsletters' => array('s_format'),
    ),
  ),

  'flag_actions' => array(
    'references' => array(
    ),
    'false positives' => array(
      'actions' => array('aid'),
      'trigger_assignments' => array('aid'),
    ),
  ),

  'flags' => array(
    'references' => array(
      'flag_actions' => array('fid'),
      'flag_content' => array('fid'),
      'flag_counts' => array('fid'),
      'flag_types' => array('fid'),
    ),
    'false positives' => array(
      'aggregator_category_feed' => array('fid'),
      'biblio_field_type' => array('fid'),
      'biblio_fields' => array('fid'),
      'content_field_.*' => array('field_*_fid'),
      'content_type_.*' => array('field_*_fid'),
      'image' => array('fid'),
      'profile_values' => array('fid'),
      'upload' => array('fid'),
    ),
  ),

  'imagecache_preset' => array(
    'references' => array(
      'imagecache_action' => array('presetid'),
    ),
    'false positives' => array(
    ),
  ),

  'legal_conditions' => array(
    'references' => array(
      'legal_accepted' => array('tc_id'),
    ),
    'false positives' => array(
    ),
  ),

  'locales_source' => array(
    'references' => array(
      'locales_target' => array('lid', 'plid'),
    ),
    'false positives' => array(
      'book' => array('mlid'),
      'menu_links' => array('plid' ),
      'webform' => array('additional_validate'),
    ),
  ),

  'menu_links' => array(
    'references' => array(
      'book' => array('mlid'),
      'menu_links' => array('plid'),
    ),
    'false positives' => array(
    ),
  ),

  'mode' => array(
    'references' => array(
    ),
    'false positives' => array(
      'formdefaults_forms' => array('formid'),
    ),
  ),

  'node' => array(
    'references' => array(
      'biblio' => array('nid'),
      'biblio_collection' => array('nid'),
      'biblio_contributor' => array('nid'),
      'biblio_keyword' => array('nid'),
      'biblioreference_title_keyword' => array('nid'),
      'book' => array('nid'),
      'comments' => array('nid'),
      'content_field_.*' => array('nid', 'field_*_nid'),
      'content_type_.*' => array('nid', 'field_*_nid'),
      'feedapi' => array('nid'),
      'feedapi_mapper' => array('nid'),
      'feedapi_node_item' => array('nid'),
      'feedapi_node_item_feed' => array('feed_nid', 'feed_item_nid'),
      'flag_content' => array(array('content_type' => 'node', 'content_id' => '*')),
      'forum' => array('nid'),
      'image' => array('nid'),
      'image_attach' => array('nid'),
      'img_assist_map' => array('nid', 'iid'),
      'nat' => array('nid'),
      'node_access' => array('nid'),
      'node_field_rdf' => array('property_nid'),
      'node_revisions' => array('nid'),
      'node_type_rdf' => array('class_nid'),
      'og' => array('nid'),
      'og_access_post' => array('nid'),
      'og_ancestry' => array('nid', 'group_nid'),
      'og_uid' => array('nid'),
      'pdsolicit' => array('nid'),
      'poll' => array('nid'),
      'poll_choices' => array('nid'),
      'privacy' => array('nid'),
      'search_block' => array('nid'),
      'simplenews_mail_spool' => array('nid'),
      'simplenews_newsletters' => array('nid'),
      'term_node' => array('nid'),
      'taxonomy_facets_node' => array('nid'),
      'taxonomy_facets_term_node' => array('nid'),
      'upload' => array('nid'),
      'webform' => array('nid'),
      'webform_component' => array('nid'),
      'webform_roles' => array('nid'),
      'webform_submissions' => array('nid'),
      'webform_submitted_data' => array('nid'),
      'workflow_node' => array('nid'),
      'workflow_node_history' => array('nid'),
      'workflow_scheduled_transition' => array('nid'),
    ),
    'false positives' => array(
      'content_field_.*' => array('field_*_fid', 'field_*_list', 'field_*_data'),
      'content_type_.*' => array('field_*_fid', 'field_*_list', 'field_*_data'),
      'node' => array('tnid'),
      'simplenews_snid_tid' => array('snid'),
    ),
  ),

  'node_revisions' => array(
    'references' => array(
      'biblio' => array('vid'),
      'biblio_collection' => array('vid'),
      'biblio_contributor' => array('vid'),
      'biblio_duplicates' => array('vid'),
      'biblio_keyword' => array('vid'),
      'content_field_.*' => array('vid'),
      'content_type_.*' => array('vid'),
      'forum' => array('vid'),
      'nat' => array('vid'),
      'node' => array('vid'),
      'simplenews_mail_spool' => array('vid'),
      'simplenews_newsletters' => array('vid'),
      'term_node' => array('vid'),
      'upload' => array('vid'),
    ),
    'false positives' => array(
      'biblio' => array('biblio_remote_db_provider'),
      'content_field_.*' => array('field_*'),
      'content_type_.*' => array('field_*'),
      'taxonomy_dhtml' => array('vid'),
      'taxonomy_tree' => array('vid'),
      'term_data' => array('vid'),
      'views_display' => array('vid'),
      'vocabulary_node_types' => array('vid'),
    ),
  ),

  'profile_fields' => array(
    'references' => array(
      'profile_values' => array('fid'),
    ),
    'false positives' => array(
      'aggregator_category_feed' => array('fid'),
      // We can safely assume all fid will refer to files.fid and not this table
      'content_field_.*' => array('field_*'),
      'content_type_.*' => array('field_*'),
      'image' => array('fid'),
      'upload' => array('fid'),
    ),
  ),

  'rdf_data' => array(
    'references' => array(
    ),
    'false positives' => array(
      'biblio_duplicates' => array('did'),
      'biblio_field_type' => array('ftdid', 'cust_tdid'),
      'biblio_field_type_data' => array('ftdid'),
    ),
  ),

  'rdf_resources' => array(
    'references' => array(
    ),
    'false positives' => array(
      'better_formats_defaults' => array('rid'),
      'blocks_roles' => array('rid'),
      'permission' => array('rid'),
      'users_roles' => array('rid'),
      'workflow_access' => array('rid'),
    ),
  ),

  'role' => array(
    'references' => array(
      'better_formats_defaults' => array('rid'),
      'blocks_roles' => array('rid'),
      'permission' => array('rid'),
      'users_roles' => array('rid'),
      'webform_roles' => array('rid'),
      'workflow_access' => array('rid'),
    ),
    'false positives' => array(
    ),
  ),

  'simplenews_subscriptions' => array(
    'references' => array(
      'simplenews_snid_tid' => array('snid'),
    ),
    'false positives' => array(
    ),
  ),

  'term_data' => array(
    'references' => array(
      'forum' => array('tid'),
      'nat' => array('tid'),
      'permission' => array('tid'),
      'rdf_data' => array('tid'),
      'simplenews_mail_spool' => array('tid'),
      'simplenews_newsletters' => array('tid'),
      'simplenews_snid_tid' => array('tid'),
      'taxonomy_facets_term_node' => array('tid'),
      'taxonomy_manager_merge' => array('main_tid', 'merged_tid'),
      'term_hierarchy' => array('tid'),
      'term_node' => array('tid'),
      'term_relation' => array('tid1', 'tid2'),
      'term_synonym' => array('tid'),
    ),
    'false positives' => array(
      'biblio_field_type' => array('tid'),
      'biblio_types' => array('tid'),
      'imagecache_action' => array('presetid'),
    ),
  ),

  'users' => array(
    'references' => array(
      'authmap' => array('uid'),
      'biblio_contributor_data' => array('drupal_uid'),
      'blogapi_files' => array('uid'),
      'comments' => array('uid'),
      'content_field_.*' => array('field_*_uid'),
      'content_type_.*' => array('field_*_uid'),
      'files' => array('uid'),
      'flag_content' => array('uid', array('content_type' => 'user', 'content_id' => '*')),
      'invite' => array('uid'),
      'invite_notifications' => array('uid'),
      'legal_accepted' => array('uid'),
      'og_notifications' => array('uid'),
      'messaging_store' => array('uid'),
      'node' => array('uid'),
      'node_revisions' => array('uid'),
      'og_uid' => array('uid'),
      'og_uid_global' => array('uid'),
      'pdsolicit' => array('uid_sender', 'uid_recipient'),
      'profile_values' => array('uid'),
      'rdf_data' => array('uid'),
      'simplenews_subscriptions' => array('uid'),
      'user_import_extra' => array('uid'),
      'users_roles' => array('uid'),
      'webform_submissions' => array('uid'),
      'workflow_node' => array('uid'),
      'workflow_node_history' => array('uid'),
    ),
    'false positives' => array(
      'feedapi_node_item' => array('guid'),
    ),
  ),

  'views_view' => array(
    'references' => array(
      'views_display' => array('vid'),
    ),
    'false positives' => array(
      'biblio' => array('vid', 'biblio_remote_db_provider'),
      'biblio_collection' => array('vid'),
      'biblio_contributor' => array('vid'),
      'biblio_duplicates' => array('vid'),
      'biblio_keyword' => array('vid'),
      'content_field_.*' => array('vid', 'field_*_nid', 'field_*_fid', 'field_*_list', 'field_*_data'),
      'content_type_.*' => array('vid', 'field_*_nid', 'field_*_fid', 'field_*_list', 'field_*_data'),
      'forum' => array('vid'),
      'nat' => array('vid'),
      'node' => array('vid'),
      'simplenews_mail_spool' => array('vid'),
      'simplenews_newsletters' => array('vid'),
      'taxonomy_dhtml' => array('vid'),
      'taxonomy_tree' => array('vid'),
      'term_data' => array('vid'),
      'term_node' => array('vid'),
      'upload' => array('vid'),
      'vocabulary_node_types' => array('vid'),
    ),
  ),

  'vocabulary' => array(
    'references' => array(
      'nat' => array('vid'),
      'taxonomy_dhtml' => array('vid'),
      'taxonomy_tree' => array('vid'),
      'vocabulary_node_types' => array('vid'),
    ),
    'false positives' => array(
      'biblio' => array('vid', 'biblio_remote_db_provider'),
      'biblio_collection' => array('vid'),
      'biblio_contributor' => array('vid'),
      'biblio_duplicates' => array('vid'),
      'biblio_keyword' => array('vid'),
      'content_field_.*' => array('vid', 'field_*_nid', 'field_*_fid', 'field_*_list', 'field_*_data'),
      'content_type_.*' => array('vid', 'field_*_nid', 'field_*_fid', 'field_*_list', 'field_*_data'),
      'forum' => array('vid'),
      'node' => array('vid'),
      'simplenews_mail_spool' => array('vid'),
      'simplenews_newsletters' => array('vid'),
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
    'false positives' => array(
    ),
  ),

  'workflow_states' => array(
    'references' => array(
      'workflow_access' => array('sid'),
      'workflow_node' => array('sid'),
      'workflow_node_history' => array('old_sid', 'sid'),
      'workflow_scheduled_transition' => array('old_sid', 'sid'),
      'workflow_transitions' => array('sid', 'target_sid'),
    ),
    'false positives' => array(
      'pdsolicit' => array('sid', 'sid_delegated'),
      'rdf_data' => array('sid'),
      'workflow_states' => array('sysid'),
    ),
  ),

  'workflows' => array(
    'references' => array(
      'workflow_states' => array('wid'),
      'workflow_type_map' => array('wid'),
    ),
    'false positives' => array(
      'content_node_field_instance' => array('widget_*'),
    ),
  ),

);



// Record system paths that have to be updated
//
// The wildcard '*' symbolizes that table's auto_increment value
//
// VIEWS ARE NOT SUPPORTED: Due to the method that views stores its data, it is
// impossible to perform a string match and replace.  Record any references made
// to specific node/users/terms NEWLY CREATED since the last merge
// in 'PostMergeInstructions.txt' and update the view after merging.  Direct
// references to nodes created before the last merge will cause no
// difficulties.
//
// Patterns tracks *exact* values of the columns' entire string.  Fuzzy will perform a search and replace
//
// Do not use the # character in any pattern
// Use two \'s for a single \

$system_paths = array(
  'node' => array(
    'patterns' => array('node/*', 'node/*/edit', 'node/*/feed'),
    'fuzzy' => array('s:#NUMLEN+5#:\\"node/*\\";', 's:3:\\"nid\\";s:#NUMLEN#:\\"*\\";'),
    'tables' => array(
      'content_node_field_instance' => array('widget_settings'),
      'menu_links' => array('link_path', 'router_path'),
      'menu_router' => array('path', 'tab_parent', 'tab_root'),
      'url_alias' => array('src'),
      'variable' => array('value'),
    ),
  ),

  'term_data' => array(
    'patterns' => array('taxonomy/term/*', 'taxonomy/term/*/feed'),
    'fuzzy' => array('s:#NUMLEN+5#:\\"term/*\\";', 's:3:\\"tid\\";s:#NUMLEN#:\\"*\\";'),
    'tables' => array(
      'content_node_field_instance' => array('widget_settings'),
      'menu_links' => array('link_path', 'router_path'),
      'menu_router' => array('path', 'tab_parent', 'tab_root'),
      'url_alias' => array('src'),
      'variable' => array('value'),
    ),
  ),

  'users' => array(
    'patterns' => array('user/*'),
    'fuzzy' => array('s:#NUMLEN+5#:\\"user/*\\";', 's:3:\\"uid\";s:#NUMLEN#:\\"*\\";'),
    'tables' => array(
      'content_node_field_instance' => array('widget_settings'),
      'menu_links' => array('link_path', 'router_path'),
      'menu_router' => array('path', 'tab_parent', 'tab_root'),
      'url_alias' => array('src'),
      'variable' => array('value'),
    ),
  ),
);