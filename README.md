# Netmatters HTML/CSS Reflection

This repository contains the source code and other notes and resources produced throughout the assignment.

Folder structure:
----------------------------------------------------------------------------------
CSS - Contains the compiled stylesheet and stylesheet map.
----------------------------------------------------------------------------------
IMG - Contains the assets used throughout the site.
----------------------------------------------------------------------------------
SCSS - Contains 4 sub-directories: base, layout, module and utilities

Base folder -> Contains the normalize CSS and base styles.
Layout folder -> Contains the container styles.
Module folder -> Contains partials for each section of the web page (header, navigation, hero etc.).
Utilities folder -> Contains helper partials (mixins, functions, variables).

style.scss file -> Imports the _index.scss files from each subdirectory.

Note: In each subdirectory inside SCSS folder, there is a file called _index.scss. This file imports all other partials in that sub-directory.
----------------------------------------------------------------------------------


