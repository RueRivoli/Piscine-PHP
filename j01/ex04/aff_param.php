#!/usr/bin/php 
<?PHP

function aff_param($p)
{
    $i = 1;
    while ($p[$i]) 
    {
        echo "$p[$i]"."\n";
        $i++;
    }
}
aff_param($argv);
?>