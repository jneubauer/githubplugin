# Github Embed Plugin

quick plugin to embed files or parts of files from public github repositories into Joomla! content.

#How To Use This Plugin

after installation, there are no parameters to set up.

This plugin uses similar shortcodes to Joomla's core loadposition and loadmodule plugins.

Example:  
>{githubembed jneubauer/githubplugin/blob/master/githubembed.php}

That example will embed the githubembed.php file from https://github.com/jneubauer/githubplugin/blob/master/githubembed.php into your Joomla! content.

###Options are available to limit the code being displayed to only a certain set of rows from the file.

Example:  
>{githubembed jneubauer/githubplugin/blob/master/githubembed.php 12:16}

That example will only show lines 12-16 of that file.

####Other filtering options available:

1:   skips the first line, and shows the rest of the file  
0:-1   shows the first line all the way until, and including, the next to last line of the file  
17:83   shows lines 17-83 from the file  
9   shows line 9 of the file

***

[Tweet me @219jondn or something](http://twitter.com/219jondn "Tweet at @219jondn")