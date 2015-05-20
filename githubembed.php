<?php
//no direct access
defined( '_JEXEC' ) or die;

class plgContentGithubembed extends JPlugin
{
    protected $autoloadLanguage = true;

    function OnContentPrepare($context, &$article, &$params)
    {
        if (strpos($article->text, 'githubembed') !== false)
        {
            $codeStart = strpos($article->text, 'githubembed');
            $codeEnd = strpos($article->text, '}', $codeStart);
            $shortCode = substr($article->text,$codeStart,($codeEnd-$codeStart));
            $embedParts = explode(" ", $shortCode);
            $embedReplace = '{'.$shortCode.'}';
            if (count($embedParts) === 3)
            {
                $embed = '<script src="http://gist-it.sudarmuthu.com/github/'.$embedParts[1].'?slice='.$embedParts[2].'"></script>';
            }
            else
            {
                $embed = '<script src="http://gist-it.sudarmuthu.com/github/'.$embedParts[1].'?footer=minimal"></script>';
            }
            $article->text = str_replace($embedReplace,$embed,$article->text);
            return true;
        }
    }
}
?>