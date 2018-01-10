#!/usr/bin/php 
<?PHP

function comp_min($a, $b)
{
	$var = ord($a);

	$var = ord($b);
	if ((ord($a) > 64 && ord($a) < 91) && (ord($b) > 64 && ord($b) < 91))
		return (ord($b) - ord($a));
	else if ((ord($a) > 96 && ord($a) < 123) && (ord($b) > 96 && ord($b) < 123))
		return (ord($b) - ord($a));
	else if ((ord($a) > 64 && ord($a) < 91) && (ord($b) > 96 && ord($b) < 123))
		return (ord($b) - ord($a) - 32);
	else 
		return (-comp_min($b, $a));
}

function comp_with_alpha($a, $b)
{
	if ((ord($b) > 64 && ord($b) < 91) || (ord($b) > 96 && ord($b) < 123))
		return (comp_min($a, $b));
	return (1);
}

function comp_with_nb($a, $b)
{
	if (((ord($b) > 64 && ord($b) < 91) || (ord($b) > 96 && ord($b) < 123)))
		return (-1);
	else if (ord($b) > 47 && ord($b) < 58)
		return (ord($b) - ord($a));
	return (1);
}

function comp_with_others($a, $b)
{
	if (((ord($b) > 64 && ord($b) < 91) || (ord($b) > 96 && ord($b) < 123)) || (ord($b) > 47 && ord($b) < 58))
		return (-1);
	return (ord($b) - ord($a));
}

function compare_char($a, $b)
{	
	if ((ord($a) > 64 && ord($a) < 91) || (ord($a) > 96 && ord($a) < 123))
		return (comp_with_alpha($a, $b));
	else if (ord($a) > 47 && ord($a) < 58)
		return (comp_with_nb($a, $b));
	return (comp_with_others($a, $b));
}

function compare_word($p1, $p2)
{
	$i = 0;
	while (ord($p1[$i]) && ord($p2[$i]))
	{
		$var = compare_char($p1[$i], $p2[$i]);
		if ($var > 0)
			return (1);
		else if ($var < 0)
			return (-1);
		$i++;
	}
	if ($p1[$i] || $p2[$i])
	{
		if ($p1[$i] && !$p2[$i])
			return (-1);
		return (1);
	}
	return (1);
}

function sort_list($p)
{
	$i = 0;
	$var = 0;

	while ($p[$i] && $p[$i + 1])
	{
		
		if (compare_word($p[$i], $p[$i + 1]) < 0)
		{	
			$var = $p[$i];
			$p[$i] = $p[$i + 1];
			$p[$i + 1] = $var;
			$i = 0;
		}
		else
			$i++;
	}
	return ($p);
}

function impr($p)
{
    $i = 0;
    while ($p[$i]) 
    {
        echo "$p[$i]"."\n";
	$i++;
    }
}

if (argc >= 0)
{
      $var = array();
      unset($argv[0]);
      foreach($argv as $v)
      {
         $tmp = array_filter(explode(' ', $v));
        foreach ($tmp as $v)
	     $var[] = $v;
       }
       sort($var);
       $var = sort_list($var);
       impr($var);
}
?>