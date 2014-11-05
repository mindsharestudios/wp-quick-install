WP Quick Install
================

WP Quick Install is the easiest way to install WordPress.

A lightweight script which automatically downloads and install WordPress, plugins and themes you want.

## Usage
Just run this command from your terminal in your site root and then visit go to *wp-quick-install-master/index.php* in your browser:

```
wget https://github.com/mindsharestudios/wp-quick-install/archive/master.zip; unzip master.zip; rm -rvf master.zip; echo " "; echo "======="; echo "The  latest version of WP Quick Install is ready to run. Remember to delete this folder after your are done."; echo "======="; ls -lA;
```

Or you can add this as a BASH alias:

```
# remove any old version of the installer
unalias wp-quick;

# add the installer as a BASH alias
alias wp-quick="wget https://github.com/mindsharestudios/wp-quick-install/archive/master.zip; unzip master.zip; rm -rvf master.zip; echo ' '; echo '======='; echo 'The  latest version of WP Quick Install is ready to run. Remember to delete this folder after your are done.'; echo '======='; ls -lA;"

# source the new alias
source ~/.bashrc;

# run the install
wp-quick;

```

Changelog
================

##0.9.1
-----------
* Fixed fatal error if debug was enabled

##0.9
-----------
* Fixed most major bugs since forking project
