# doxygen2dash
Scripts for converting Doxygen documentation into dash format for Zeal

REQUIREMENTS:
    make, php, doxygen

HOW TO INSTALL:
    make prepare

HOW TO CONFIGURE:
    Just on Doxygen configureation file and change what ever you want.
    But you have to leave last for strings. GENERATE_DOCSET is required.
-----------------------
GENERATE_DOCSET   = YES
DISABLE_INDEX     = YES
SEARCHENGINE      = YES
GENERATE_TREEVIEW = NO
-----------------------

HOW TO USE:
    make install

LINKS:
	Zeal - https://zealdocs.org/
	Zeal source - https://github.com/zealdocs/zeal
