# CakePHP MYSQL Import

Developed by: [George Whitcher](http://georgewhitcher.com)

Easily import from a MYSQL file with CakePHP and this script.

## Installation

* Export your MYSQL file using PHPMYADMIN.
* Replace initial.sql with your MYSQL file. (Must be named initial.sql)
* Setup a route in your /config/routes.php like $routes->connect('/mysql_import', array('controller' => 'Some', 'action' => 'mysql_import'));
* Enjoy!

## Enable Version Control

* Remove the comments and the beggining and end of the lines //Uncomment for version control!
* Comment or remove the two lines above it which are used for the initial.sql install.
* Put your files in the /mysql/versions/ folder. (It is suggested you figure out a naming scheme to order your files like seen.)
* Setup a route in your /config/routes.php like $routes->connect('/mysql_import', array('controller' => 'Some', 'action' => 'mysql_import'));
* Enjoy!

## Get Support!

[Issues](https://bitbucket.org/gwhitcher/cakeblog/issues) - Got issues? Please tell me!
[Homepage](http://georgewhitcher.com) - George Whitcher's Homepage.