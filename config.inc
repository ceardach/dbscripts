<?php

/**
 * Path Settings
 *   - Relative path from where you would be running the scripts
 *     (assumed to be your version control root, which may or may not differ from
 *     your web root)
 *   - Do not use trailing slashes
 */

// Location of dbscripts folder
$script_path = './dbscripts';

// Location of settings.php
$settings_path = './sites/default';

// Location where database dump files will be stored
$dump_path = './databases';

// Location of mysql binaries (needs to be set if not in your path)
$mysql = 'mysql';
$mysqldump = 'mysqldump';

// Charset location
$charsets = '/usr/local/share/mysql/charsets';

//Database type (mysql, mysqli)
$dbtype = 'mysqli';



/**
 * Filtered tables
 * Some data is not nessisary in some cases and shouldn't be stored
 */

// These tables are always filtered except when 'none' filtering option is used
// always deleted when performing a restore
$tables_filtered =  array(
  'cache',
  'cache_.*',
  'views_object_cache',
  'votingapi_cache',
);

// Tables for 'min' filtering option
// preserved in working space
$tables_filtered_l1 = array(
  'sessions',
  'openid_association',
);

// Tables for 'full' filtering option, in addition to 'min'
// preserved in working space
$tables_filtered_l2 =  array(
  'accesslog',
  'aggregator_item',
  'aggregator_category_item',
  'comments',
  'comment_notify',
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


/**
 * Classifying Tables
 * Should the data be taken from development, production, or be merged from the two
 */

// Tables that contain content to be merged from both development and production
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
  'menu_router',
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
  'users',
  'users_roles',
  'vocabulary',
  'vocabulary_node_types',
  'webform_submissions',
  'webform_submitted_data',
);

// Tables that contain content to be taken from production
// Will override any data made during development
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
  'votingapi_vote',
  'watchdog',
);