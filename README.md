# Sprint Assignment 1

## Important information:

### Adding your DB credentials:

There is a file included called "db-creds-TEMPLATE.json". Make a copy of this file named "db-creds.json". Then add your credentials to this new file only. 
**DO NOT ADD THEM TO THE TEMPLATE FILE!** If you do this exactly right, the ".gitignore" file will keep git from tracking it, so you don't have to worry about 
accidentally adding it with a "git add ." command.

This is all you have to do. const.php is configured to pull in your db-creds as long as the db-creds.json file is in the same directory.

**NOTE:** The gitignore pattern has been updated, so as long as you keep your file named "db-creds.json", it should be safe to put it in any directory.

**NOTE:** The testDBclass.php has also been added to gitignore, so you may also keep that file locally as a reference and it will not track.

### Using absolute pathing:

In order to prevent breakage when including files in another directory that pull in other files, using absolute pathing is the way to go for any scripts being 
included elsewhere that also have to pull in resources.

A main_include.php file can be generated to bind the project directory's absolute path with the variable name "$PATH_". **(See build section below on how to 
generate.)**

Usage example:
```php
require_once("path/to/main_include.php");
...

json_decode("{$PATH_}/local/path/to/myfile.json");
```

**\*Using this variable name prevents the breaking mentioned above, allows paths in your code to be independent of directory structure outside of your 
project, and decreaces connascence in the event that you have to move your project to a different directory.\***

### Keeping current:

It is probably a good idea to make sure you are keeping an eye on the github repo and pulling changes to the master branch down as often as possible to make 
merge conflicts during pushing less likely.

**IMPORTANT NOTE:** You should always do a git pull from the remote repo first **BEFORE** pushing. This way, you can resolve merge conflicts locally and don't 
end up making the github repo dirty.

## Building the project

Step 0: Add your DB credentials (see above).

Step 1: Generate main_include.php and set your environment variables.

```
./setup.sh
```
or
```
./setup.sh --set-root /path/to/project/directory
```

Step 2: Run the php patch script to create the mapping table needed for booksearch.php

```
cd patch && php generateMappingTable.php
```

## Backlog:

- improve directory structure
- add book search page
- move contact results page to book search results page
- make search page search across all book info fields (title, author, isbn)
- add code to capture contact form data and store in database
- add code to populate results html page
- if code is requested for inserting bookinfo, write code for populating mapping table

### Note:

The notebook with the hard-copy of this list is currently missing, so this list may not be complete.
