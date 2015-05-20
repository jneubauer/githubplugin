<?php
//no direct access
defined( '_JEXEC' ) or die;

class plgContentGithubembed extends JPlugin
{
    protected $autoloadLanguage = true;

    function OnContentPrepare($context, $article, $params, $limistart)
	 {
         # if the shortcode isn't found in the article, quit
         if (strpos($article->text, 'githubembed') === false)
         {
             return true;
         }

         # find the github file
         $regex		= '/{githubembed\s(.*?)}/i';

         # making an array of the parts of the shortcode, cutting out the spaces
         $strArray = explode(' ',$regex);

         #sets the github file as the second element in the array, skipping the 'githubembed' shortcode
         $githubfile = $strArray[1];

         # if there are line parameters, let's set those too
         if (array_count_values($strArray) === 3)
         {
             $githublines = $strArray[2];
         }

         # if the string contains three parts, indicating a file line set of parameters
         if (array_count_values($strArray) === 3)
         {
             # set embed
             $embed = '<script src="http://gist-it.sudarmuthu.com/github/'.$githubfile.'?slice='.$githublines.'?footer=minimal"></script>';

             # replace content
             $article->text = preg_replace("|$regex|", addcslashes($embed, '\\$'), $article->text, 1);

             return true;
         }
         # everything else
         else
         {
             # set embed
             $embed = '<script src="http://gist-it.sudarmuthu.com/github/'.$githubfile.'?footer=minimal"></script>';

             # replace content
             $article->text = preg_replace("|$regex|", addcslashes($embed, '\\$'), $article->text, 1);

             return true;
         }
     }
}
?>