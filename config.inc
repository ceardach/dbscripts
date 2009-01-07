<?php

/**
 * Path Settings
 *   - Relative path from where you would be running the scripts
       (assumed to be your version control root, which may or may not differ from
       your web root)
 *   - Do not use trailing slashes
 */

// Location of dbscripts folder
$script_path = './dbscripts';

// Location of settings.php
$settings_path = './sites/default';

// Location where database dump files will be stored
$file_path = './databases';

// Location of mysql binaries (needs to be set if not in your path)
$mysql = 'mysql';
$mysqldump = 'mysqldump';

// Charset location
$charsets = '/usr/local/share/mysql/charsets';


/**
 * Database type (mysql, mysqli)
 */
$dbtype = 'mysqli';



/**
 * Arrays of tables to dictate how each of their data should be manipulated
 */

// Tables to be filtered and not stored
// These tables are always used except when 'none' filtering option is used
$tables_filtered =  array(
  'cache',
  'cache_.*',
  'views_object_cache',
  'votingapi_cache',
);


// Tables to be filtered and not stored, but preserved in the working space
// Tables for 'full' filtering option
$tables_filtered_full =  array(
  'accesslog',
  'aggregator_item',
  'aggregator_category_item',
  'comments',
  'node_comment_statistics',
  'fivestar_comment',
  'flood',
  'history',
  'mollom',
  'node_comment_statistics',
  'node_counter',
  'poll_votes',
  'search_dataset',
  'search_index',
  'search_node_links',
  'search_total',
  'votingapi_vote',
  'watchdog',
);

// Tables for 'min' filtering option
$tables_filtered_min = array(
  'sessions',
  'openid_association',
);


// Tables that contain content to be merged
$tables_merge = array(
  'aggregator_category',
  'aggregator_category_feed',
  'aggregator_feed',
  'authmap',
  'blogapi_files',
  'book',
  'content_field_.*', 
  'content_type_.*', 
  'files',
  'forum',
  'image',
  'image_attach',
  'img_assist_map',
  'menu_links',
  'node',
  'node_access',
  'node_revisions',
  'profile_values',
  'poll',
  'poll_choices',
  'term_data',
  'term_hierarchy',
  'term_node',
  'term_relation',
  'term_synonym',
  'upload',
  'url_alias',
  'vocabulary',
  'vocabulary_node_types',
  'webform_submissions',
  'webform_submitted_data',
);


// Tables that contain user data and user tracking
// This data will override any data made during development
$tables_override = array(
  'accesslog',
  'aggregator_item',
  'aggregator_category_item',
  'comments',
  'comment_notify',
  'fivestar_comment',
  'flood',
  'history',
  'mollom',
  'node_counter',
  'node_comment_statistics',
  'poll_votes',
  'profile_values',
  'search_dataset',
  'search_index',
  'search_node_links',
  'search_total',
  'sessions',
  'users',
  'users_roles',
  'votingapi_vote',
  'watchdog',
);

// Tables used for everything else.  Just here for the sake of recording it.
$tables_structure = array(
  'access',
  'actions',
  'actions_aid',
  'advanced_help_index',
  'batch',
  'blocks',
  'blocks_roles',
  'boxes',
  'contact',
  'content_group',
  'content_group_fields',
  'content_node_field',
  'content_node_field_instance',
  'filters',
  'filter_formats',
  'imagecache_action',
  'imagecache_preset',
  'languages',
  'locales_source',
  'locales_target',
  'menu_custom',
  'menu_router',
  'node_type',
  'permission',
  'profile_fields',
  'role',
  'system',
  'trigger_assignments',
  'variable',
  'views_display',
  'views_view',
  'webform',
  'webform_component',
  'webform_roles',
);


// SQL comments that should not be unset
// you probably don't need to edit this
$sql_comment_unset = array(
  '..!40103 SET TIME_ZONE=@OLD_TIME_ZONE ..;',
  '..!40101 SET SQL_MODE=@OLD_SQL_MODE ..;',
  '..!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS ..;',
  '..!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;',
  '..!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ..;',
  '..!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS ..;',
  '..!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION ..;',
  '..!40111 SET SQL_NOTES=@OLD_SQL_NOTES ..;',
);
