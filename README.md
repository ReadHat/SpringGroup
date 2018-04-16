# Sprint Assignment

## Important information:

### Keeping current:

It is probably a good idea to make sure you are keeping an eye on the github repo and pulling changes made to the master branch down as often as possible to make 
merge conflicts during pushing less likely.

**IMPORTANT NOTE:** You should always do a git pull from the remote repo first **BEFORE** pushing. This way, you can resolve merge conflicts locally.

### Adding your DB credentials:

There is a file included called "db-creds_TEMPLATE.php". Make a copy of this file named "db-creds.php" and place it in the DB directory. Then add your 
credentials to this new file only. **DO NOT ADD THEM TO THE TEMPLATE FILE!** If you do this exactly right, the ".gitignore" file will keep git from 
tracking it, so you don't have to worry about accidentally adding it with a "git add ." command.

This is all you have to do. const.php is configured to pull in your db-creds **as long as the db-creds.php file is in the same directory.**

**NOTE:** The testDBclass.php has also been added to gitignore, so you may also keep that file locally as a reference and it will not track.

### Autoloading php

There is a file included called ".htaccess_TEMPLATE". Make a copy of this in the top directory in your project, name it ".htaccess", and fill in the 
 marked-up sections according to the state of your filesystem.

## Backlog:

- [see issues tab](https://github.com/ReadHat/SprintGroup/issues)
