INSTALLATION

  1.  Place the dbscripts folder wherever you would wish.  It is recommended to 
      not put it within your web root (anywhere within Drupal core) and instead 
      place it at least one directory above your web root.  For example:
        - /home
          - your_website
            - htdocs
              - Drupal core files
            - databases
              - location to dump the database files
            - dbscripts
  
  2.  Copy config.inc.example, config.references.example and 
      MergeInstructions.txt.example preserving their file names and removing 
      ".example".  Read them and configure them as needed.
  
  3.  Ensure dump.php, erase.php, find.php, merge.php, raise_increments.php and 
      restore.php files are all executable.
        - e.g.: chmod ug+x dbscripts/*.php



EXAMPLE USES

Dumping the database:
    Development: ./dbscripts/dump.php
    Production: ./dbscripts/dump.php production min
    Last Merge: ./dbscripts/dump.php last-merge

Restoring a database file:
    Development:  ./dbscripts/restore.php
    Production:   ./dbscripts/restore.php production min
    Last Merge:   ./dbscripts/restore.php last-merge

    For the first restore on an empty MySQL database, use the filter flag 
    'none', e.g.:
                  ./dbscripts/restore.php none
                  ./dbscripts/restore.php production none

    See issue for details: http://drupal.org/node/380612

Merging the databases:
    First bring last-merge and production to the same schema as development.sql
    ./dbscripts/merge.php

Use 'help' for detailed information on each script,  
    - e.g.: ./dbscripts/dump.php help



HOW TO START

New Development

    When  you start a new website, you may solely dump to development and don't 
    need to yet worry about last-merge and production.  After installing the 
    dbscripts files, performing a dump (the commands outlined above) will 
    successfully create a dump folder for you in the databases directory.
    
    When you are ready to deploy a production version of the website, dump the 
    database for both last-merge and production.  On the production server, 
    restore the production version. 

Existing Site in Production

    Create a clone of the production site.  Install dbscripts on the clone, and 
    dump the database three times: once for development, last-merge and 
    production.  Deploy the file changes that installed dbscripts to the 
    production site, and dump the production database as production.  

Decide CCK Handling

    If you are using CCK (as everyone does), chose one of the following two 
    methods handle the schema changes it makes:
      - Export/Import Method
          - Apply the patch for content_copy to allow modifying existing fields
          - Within your Drupal website, enable the content_copy module and 
            export all of your content types.  Save the export data in files 
            during development (such as within ./databases/content_types)
      - Table-per field method
          - If you have existing CCK fields, edit all of them to have 
            'multiple values', then disable that option.  It will force each 
            field to use it's own table.
          - Whenever creating a new field, first set it to have 'multiple 
            values' enabled, then disable it
      
    The Fields in Core for Drupal 7 will use a table per field by default.

Tips  

    Create backups of the production site by setting up a cron job to 
    automatically use dbscripts to dump as production, and commit to your 
    repository.
    
    Do NOT touch the last-merge version, except to update its schema before a 
    merge.
    
    Enable revisions on ALL content types, and install the Diff module.  It 
    helps tremendously in conflict resolution (such as if the same node was 
    edited in both development and production).



REQUIRED

GNU Diff3.  Sun Solaris, for example, uses their own version of Diff3 which is 
incompatible with how it is used in this script.


GNU AWK (GAWK).  Sun Solaris may not have a compatible version of AWK.  

You will have to install the GNU versions of these programs when using Sun 
Solaris.


MERGING DATABASES 

WARNING:  Once you've performed a merge you *must* deploy it to the production 
          site.  You may _test_ merges with production data, but any kept 
          merges must be deployed or it will break the ability to merge the 
          current production site again. 

There are three databases stored: development, production and last-merge.  
Development and production are obvious to their namesake, while last-merge 
records the last point the two branches were identical.  Since both development 
and production have the power to create, delete and modify content, the 
last-merge database serves as a starting point to compare with so the 
difference between an addition and a subtraction can be properly tracked.

This script assumes the production database will only track content and users.  
Other changes made and stored in the production database will be lost.  
Additionally, user data is not preserved in development after a merge.

Manually, the developer will first bring the merged and production databases to 
have the same structure as the development database (for the data we're 
concerned with, anyways) by loading each database into MySQL, accessing the 
site through a web browser, running update.php and importing the content types 
in ./databases/content_types.  

NOTE: To ensure there is no conflict between development database and 
      production database, the table structures must be the same for all three 
      databases first.  To do this, follow these steps:

    NOTE: Perform these steps in a staging area!

    1.  Update all files with your version control system

    2.  Restore the last-merge database: 
          ./dbscripts/restore.php last-merge min

    3.  Run update.php as needed

    4.  Import content_type data as needed

    5.  Dump database: 
          ./dbscripts/dump.php last-merge

    6.  Restore the production database: 
          ./dbscripts/restore.php production min

    7.  Repeat steps 3 & 4 for the production database

    8.  Dump database:
          ./dbscripts/dump.php production min

    9.  Run the merge script:
          ./dbscripts/merge.php

    10. Restore a database (preferably production):
          ./dbscripts/restore.php production none

    11. Test, test, test, then test some more

    12. Commit to your version control system
    

WARNING:  When merging development and production databases, the development 
          will lose all user data and be replaced with production user data.  
          Also keep aware it merges ALL nodes, so nodes created for testing 
          purposes should first be deleted or unpublished before merging the 
          databases.


MERGE CONFLICTS

Conflicts can happen, and the script will catch it allow you to resolve the 
conflicts manually.  The most frequent causes of conflicts are:

  * Editing the same piece of content on both development and production.  
    Just try not to do that.  To gracefully resolve that issue, though, keep 
    revisions enabled and install the diff module.  During conflict resolution 
    you will only have to pick which revision to use in the node table - both 
    revisions will be preserved, it's just choosing which one will be visible.  
    Then you can go in and see the revision changes using the diff module for 
    each version, and manually resolve them.

  * Upgrading the schema incorrectly.  If there are A LOT of conflicts, it's 
    probably a schema issue.  Ensure that you performed the schema synching 
    correctly and that each column is in the correct order.

  * I have fixed the problem where the users table would conflict frequently 
    due to the timestamp constantly changing.  When dumping as development, the 
    users timestamps will be reverted back to the last-merge version.

Perform test merges frequently so you'll be kept informed of any issues as they 
come up.  

Use the MergeInstructions.txt file to track what actions need to be performed 
before and after merging.  Example:  You added a new CCK field, and then have 
to enable a setting in a node that was added during the production branch.  Or, 
you edited the same node on both development and production and you note it 
needs to be manually resolved.


MORE INFORMATION

Drupal Docs: http://drupal.org/project/dbscripts

Blog posts:
  Deployment -- http://ceardach.com/blog/tags/deployment
  Development Workflow -- http://ceardach.com/blog/tags/development-workflow
  Version control -- http://ceardach.com/blog/tags/version-control