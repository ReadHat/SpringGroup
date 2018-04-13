# Sprint Assignment

## Important information:

### Keeping current:

It is probably a good idea to make sure you are keeping an eye on the github repo and pulling changes to the master branch down as often as possible to make 
merge conflicts during pushing less likely.

**IMPORTANT NOTE:** You should always do a git pull from the remote repo first **BEFORE** pushing. This way, you can resolve merge conflicts locally.

### Adding your DB credentials:

There is a file included called "db-creds_TEMPLATE.php". Make a copy of this file named "db-creds.php" and place it in the DB directory. Then add your 
credentials to this new file only. **DO NOT ADD THEM TO THE TEMPLATE FILE!** If you do this exactly right, the ".gitignore" file will keep git from 
tracking it, so you don't have to worry about accidentally adding it with a "git add ." command.

This is all you have to do. const.php is configured to pull in your db-creds **as long as the db-creds.php file is in the same directory.**

**NOTE:** The testDBclass.php has also been added to gitignore, so you may also keep that file locally as a reference and it will not track.

## Backlog:

- [see issues tab](https://github.com/ReadHat/SprintGroup/issues)
