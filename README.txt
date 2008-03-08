QUICK START GUIDE

1) enter these in the command line:

cp dbscripts/config.inc.example dbscripts/config.inc
cp dbscripts/PostMergeInstructions.txt.example dbscripts/PostMergeInstructions.txt

2) Configure config.inc to your needs, especially the relative paths


WARNING: 

Merged databases should only be performed on stable and secure versions ready for 
public consumption!

MERGING CONCEPT: 

There are three databases stored: development, production and last-merge.  
Development and production are obvious to their namesake, while last-merge records 
the last point the two branches were identical.  Since both development and 
production have the power to create, delete and modify content, the last-merge database 
serves as a starting point to compare with so the difference between an addition and 
a subtraction can be tracked.

This script assumes that production database will only track content and users.  
Other changes made and stored in the production database will be lost.  Additionally, 
users and user data is not preserved in development after a merge.

Manually, the developer will first bring the merged and production databases to 
have the same structure as the development database (for the data we're concerned 
with, anyways) by loading each database into MySQL, accessing the site through a 
web browser, running update.php and importing the content types in 
dbscripts/content_types.  

Running the merge script will then strip all content and user data from the 
development database and use that as a "skeleton."  User data is taken from 
production and appended to the skeleton.  Data to be merged is taken from all three 
databases and the production and development data compared with the last-merge data. 
Diff3 is run on the three versions creating a newly merged data set.  That data is 
then appended to the end of the database structure skeleton. 

Finally, to have all data in the right spot and ordered in the right way in the 
dump files (so a proper svn diff can be created), the databases are restored and 
dumped again.  

Finally, the production database is loaded into MySQL by the end of this script.  
That version should be tested thoroughly.


NOTE: To ensure there is no conflict between development database and production 
      database, the table structures must be the same for all three databases 
      first.  To do this, follow these steps:
        1) SVN update all files
        2) Restore the last-merge database
        3) Run update.php as needed
        4) Import content_type data as needed
        5) Dump as development database
        6) Copy development database to last-merge
        7) SVN revert development database
        7) Repeat steps 2-4 for the production database
        8) Dump as production database
        9) Run the merge script
        10) Test, test, test, then test some more
        11) Commit

WARNING: When merging development and production databases, the development will 
         lose all user data.  Also keep aware it merges ALL nodes, so nodes
         created for testing purposes should first be deleted or unpublished
         before merging the databases.

