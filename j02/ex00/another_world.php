#!/usr/bin/php
<?PHP

function another_world($p)
{
    $array = preg_grep("/[^\s]/", $p);
    impr($array);
}

function impr($tab)
{
    $i = 0;
    foreach ($tab as $v)
    {
        echo $v;
        if ($i < count($tab) - 1)
             echo " ";
        $i++;
    }
    echo "\n";
}

$tab = preg_split("/[\s]+/", $argv[1]);
another_world($tab);

?>