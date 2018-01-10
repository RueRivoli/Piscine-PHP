#!/usr/bin/php 
<?PHP
function ft_is_sort($array)
{
    $tab = $array;
    sort($tab);
    if (array_diff_assoc($tab, $array) == null)
        return true;
    return false;
}
?>
