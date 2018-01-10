#!/usr/bin/php
<?PHP
function ft_split($p)
{
	$tab = explode(" ", $p);
	$var = array();
	$i = 0;
	$j = 0;
	if ($p != NULL)
		sort($tab);
	foreach ($tab as $elem)
	{
		if (!empty($tab[$j]))
		{
			$var[$i] = $tab[$j];
			$i++;
		}
		$j++;
	}
	return ($var);
}
?>
