<?php

Class Color {

    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public static $verbose = FALSE;

    public function getRed()
    {
        return $this->red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    public static function doc()
    {
        return file_get_contents('Color.doc.txt');
    }


	private function hex_to_RGB($hexStr)
	{
		$tmp = intval($hexStr);
		$tmp = dechex($tmp);
		$len = 6 - strlen($tmp);
		$i = 0;
		while ($i < $len)
		{
			$hex = $hex."0";
			$i++;
		}
		$hex = $hex.$tmp;
		$hexStr = $hex;
		$rgbArray = array();
		if (strlen($hexStr) == 6) { 
        	$colorVal = hexdec($hexStr);
        	$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        	$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        	$rgbArray['blue'] = 0xFF & $colorVal;
    	}
    	elseif (strlen($hexStr) == 3) {
        	$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        	$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        	$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    	} 
    	else 
    	{
        	return false; 
    	}
    	return ($rgbArray);
	}

    public function __construct(array $kwargs){
        if (array_key_exists('red', $kwargs) && array_key_exists('green', $kwargs) && array_key_exists('blue', $kwargs))
        {
            foreach ($kwargs as $key => $val)
				$val = intval($val);
            $this->red = $kwargs['red'];
            $this->green = $kwargs['green'];
            $this->blue = $kwargs['blue'];
        }
        else if (array_key_exists('rgb', $kwargs))
        {
            $rgbArray = $this->hex_to_RGB($kwargs['rgb']);
            $this->red = $rgbArray['red'];
            $this->green = $rgbArray['green'];
            $this->blue = $rgbArray['blue'];
            $hex = $kwargs['rgb'];
        }
        if (self::$verbose === TRUE)
        {
            print($this);
            echo " constructed.\n";
        }
    }

    function __destruct(){
        if (self::$verbose === TRUE)
        {
            print($this);
            echo " destructed.\n";
        }
    }

    public function add($col)
    {
        $r = $this->getRed() + $col->red;
        $g = $this->getGreen() + $col->green;
        $b = $this->getBlue() + $col->blue;
        return new Color(array('red'=> $r, 'green' => $g, 'blue' => $b));
    }

    public function sub($col)
    {
        $r = $this->getRed() - $col->red;
        $g = $this->getGreen() - $col->green;
        $b = $this->getBlue() - $col->blue;
        return new Color(array('red'=> $r, 'green' => $g, 'blue' => $b));
    }

    public function mult($fact)
    {
        $r = $fact * $this->red;
        $g = $fact * $this->green;
        $b = $fact * $this->blue;
        return new Color(array('red'=> $r, 'green' => $g, 'blue' => $b));
    }

    public function __toString() {
        return('Color( red: ' . sprintf("%3s", $this->red) .', green: ' . sprintf("%3s", $this->green) . ', blue: '. sprintf("%3s", $this->blue) .' )');
    }
}


?>