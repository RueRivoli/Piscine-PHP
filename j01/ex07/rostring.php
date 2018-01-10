#!/usr/bin/php 
<?PHP

function epur_str($p)
{
	$tab = explode(" ", $p);
	$var = array();
	$i = 0;
    $j = 0;
	foreach ($tab as $elem)
	{
		if (!empty($tab[$j]))
		{
            $var[$i] = $tab[$j];
            if ($var[$i + 1])
            {
                $var[$i + 1] = " ";
                $i++;;
            }
			$i++;
		}
		$j++;
    }
	return ($var);
}

function first_out($p)
{
   $i = 1;
   $var = array();
   while ($p[$i])
   {
       $var[$i - 1] = $p[$i];
       $i++;
   }
   $var[$i - 1] = $p[0];
   return ($var);
}

function impr($p)
{
    $i = 0;
    while ($p[$i])
    {
        echo "$p[$i]";
        if ($p[$i + 1])
            echo " ";
        $i++;
    }
    echo "\n";
}

function rostring($p)
{
    $tab = epur_str($p);
    $var = first_out($tab);
    return ($var);
}

if ($argc >= 2)
{
    $var = rostring($argv[1]);
    impr($var);
}
?>