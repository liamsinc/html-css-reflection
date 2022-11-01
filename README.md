# Netmatters HTML/CSS Reflection

This repository contains the source code and other notes and resources produced throughout the assignment.
I used HTML combined with SCSS/SASS to build this imitation website. I also used a HTML validator to check my markup.
Using SCSS allowed me to seperate styling rules into partials, which keep code organised and maintainable.

# FOR THE COMMON USER:

You are viewing my repository, which holds the source code for my netmatters reflection.
If you wish to view the website, follow either option below:
A) 
Visit https://netmatters.liam-sinclair.netmatters-scs.co.uk/ (easiest option)
OR
B) 
1. Navigate to Environments (right side of the page) and click the "github-pages" link.
2. On the deployments page, next to the most recent deployment there will an option to "view deployment".
3. This will take you to the site hosted by github pages.
   

# FOR THE DEVELOPER/EMPLOYER:

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


