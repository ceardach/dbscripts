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
$dbtype = 'mysql';



/**
 * Arrays of tables to dictate how each of their data should be manipulated
 */

// Tables to be filtered and not stored
// These tables are always used except when 'none' filtering option is used
$tables_filtered =  array(
  'cache',
  'cache_.*',
);


// Tables to be filtered and not stored, but preserved in the working space
// Tables for 'full' filtering option
$tables_preserved_full =  array(
  'accesslog',
  'comments',
  'forward_log',
  'forward_statistics',
  'flood',
  'history',
  'mollom',
  'node_comment_statistics',
  'node_counter',
  'search_dataset',
  'search_index',
  'search_total',
  'send',
  'send_recipient',
  'sessions',
  'views_audit',
  'watchdog',
);

// Tables for 'min' filtering option
$tables_preserved_min = array(
  'sessions',
);


// Tables that contain content to be merged
$tables_content = array(
  'authmap',
  'content_field_.*', 
  'content_type_.*', 
  'files',
  'file_revisions',
  'image',
  'img_assist_map',
  'menu',
  'node',
  'node_access',
  'node_revisions',
  'nodewords',
  'path_redirect',
  'search_block',
  'send_setting',
  'slideshow',
  'term_data',
  'term_hierarchy',
  'term_node',
  'term_relation',
  'term_synonym',
  'url_alias',
  'webfm_attach',
  'webfm_file',
  'workflow_node',
  'workflow_node_history',
  'workflow_scheduled_transition',
  'xmlsitemap_node',
  'xmlsitemap_term',
);


// Tables that contain user data and user tracking
$tables_users = array(
  'accesslog',
  'comments',
  'forward_log',
  'forward_statistics',
  'flood',
  'history',
  'mollom',
  'node_comment_statistics',
  'node_counter',
  'profile_values',
  'search_dataset',
  'search_index',
  'search_total',
  'send',
  'send_recipient',
  'users',
  'users_roles',
  'watchdog',
);


// Tables with autoincrement that will have their sequences stripped
$tables_increment = array(
  'url_alias',
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