QUICK START GUIDE

    1. Place the dbscripts folder wherever you would wish.  It is recomended to 
       not put it in your web root 
       (not your modules folder)

    2. Create the folder database dumps will save to
       (default setting in config.inc.example is as a sibling to the dbscripts 
       folder)

    3. Copy config.inc.example and PostMergeInstructions.txt.example preserving 
       their filenames and removing ".example".  Configure them as needed

    4. If you are using CCK and wish to merge schema changes:

        i. Apply the patch for content_copy to allow modifying existing fields

        ii. Within your Drupal website, enable the content_copy module and export
            all of your content types.  Save the export data in files


EXAMPLE USES

Dumping the database:
    Development: ./dbscripts/dump.php
    Production: ./dbscripts/dump.php production min
    Last Merge: ./dbscripts/dump.php last-merge

Restoring a database file:
    Development: ./dbscripts/restore.php
    Production: ./dbscripts/restore.php production min
    Last Merge: ./dbscripts/restore.php last-merge

Merging the databases:
    First bring last-merge.sql and production.sql to the same schema as 
        development.sql
    ./dbscripts/merge.php

Use 'help' for more information.  ie: ./dbscripts/dump.php help


REQUIRES

GNU Diff3 is required.  Sun Solaris, for example, uses their own version of 
Diff3 which is incompatible with how it is used in this script.


MERGING DATABASES 

Warning:  Merged databases should only be deployed on stable and secure versions 
ready for public consumption!

Once you've done a merge that you are going to keep, you must deploy it to 
production.  You can perform merges for testing purposes, but if you're going to 
commit a merged version to your version control system, you must also deploy it 
to production or they will become out of sync.  Feel free to try to fix this 
restriction.


MERGING CONCEPT

There are three databases stored: development, production and last-merge.  
Development and production are obvious to their namesake, while last-merge 
records the last point the two branches were identical.  Since both development 
and production have the power to create, delete and modify content, the 
last-merge database serves as a starting point to compare with so the difference 
between an addition and a subtraction can be tracked.

This script assumes the production database will only track content and users.  
Other changes made and stored in the production database will be lost.  
Additionally, user data is not preserved in development after a merge.

Manually, the developer will first bring the merged and production databases to 
have the same structure as the development database (for the data we're 
concerned with, anyways) by loading each database into MySQL, accessing the site 
through a web browser, running update.php and importing the content types in 
dbscripts/content_types.  

Running the merge script will then strip all content and user data from the 
development database and use that as a "skeleton."  User data is taken from 
production and appended to the skeleton.  Data to be merged is taken from all 
three databases and the production and development data compared with the 
last-merge data. Diff3 is run on the three versions creating a newly merged data 
set.  That data is then appended to the end of the database structure skeleton. 

Finally, to have all data in the right spot and ordered in the right way in the 
dump files (so a proper difference can be created for version control), the 
databases are restored and dumped again.  

The production database is loaded into MySQL by the end of this script. That 
version should be tested thoroughly.


NOTE: To ensure there is no conflict between development database and production 
      database, the table structures must be the same for all three databases 
      first.  To do this, follow these steps:

        NOTE: Perform these steps in a staging area!

        1) SVN update all files
        2) Restore the last-merge database: 
               ./dbscripts/restore.php last-merge min
        3) Run update.php as needed
        4) Import content_type data as needed
        5) Dump database: 
               ./dbscripts/dump.php last-merge
        6) Restore the production database: 
               ./dbscripts/restore.php production min
        7) Repeat steps 3 & 4 for the production database
        8) Dump database: ./dbscripts/dump.php production min
        9) Run the merge script
        10) Test, test, test, then test some more
        11) Commit

WARNING: When merging development and production databases, the development will 
         lose all user data and be replaced with production user data.  Also 
         keep aware it merges ALL nodes, so nodes created for testing purposes 
         should first be deleted or unpublished before merging the databases.


MERGE CONFLICTS

Conflicts can happen, and the script will catch it allow you to resolve the 
conflicts manually.  The most frequent causes of conflicts are:

  * Editing the same peice of content on both development and production.  Just 
    try not to do that.  To gracfually resolve that issue, though, keep 
    revisions enabled and install the diff module.  During conflict resolution 
    you will only have to pick which revision to use in the node table - both 
    revisions will be preserved, it's just choosing which one will be visible.  
    Then you can go in and see the conflicts using the diff module between the 
    two revisions.

  * Scaling issues.  Changes to the same area (such as new nodes) in both 
    versions in which at least one version had a lot of changes.  Apparently, 
    Diff will only figure it out so much, and then just gives up and declares it 
    a conflict.  Normally it's just a matter of removing the conflict markers.

  * Upgrading the schema incorrectly.  If there are A LOT of conflicts, it's 
    probably a schema issue.  Ensure that you performed the schema synching 
    correctly and that each column is in the correct order.

Perform test merges frequently so you'll be kept informed of any issues as they 
come up.  

Use the PostMergeInstructions.txt file to track what actions need to be 
performed after merging.  Example:  You added a new CCK field, and then have to 
enable a setting in a node that was added during the production branch.  Or, you 
edited the same node on both development and production and you note it needs to 
be manually resolved.
