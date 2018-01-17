<?php

Class Vertex {
    
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 0.0;

    private $_color;
    
    public static $verbose = FALSE;

    public static function doc()
    {
        return file_get_contents('Vertex.doc.txt');
    }
    
    public function getX()
    {
        return $this->_x;
    }

    public function getY()
    {
        return $this->_y;
    }

    public function getZ()
    {
        return $this->_z;
    }

    public function getW()
    {
        return $this->_w;
    }

    public function getColor()
    {
        return $this->_color;
    }
    
    public function setX($p)
    {
        $this->_x = $p;
        return;
    }

    public function setY($p)
    {
        $this->_y = $p;
        return;
    }

    public function setZ($p)
    {
        $this->_z = $p;
        return;
    }

    public function setW($p)
    {
        $this->_w = $p;
        return;
    }

    public function setColor($p)
    {
        $this->_color = $p;
        return;
    }

    public function __construct(array $kwargs){
        
        if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
        {
            $this->_x = $kwargs['x'];
            $this->_y = $kwargs['y'];
            $this->_z = $kwargs['z'];
        }
        if (array_key_exists('color', $kwargs))
            $this->_color = $kwargs['color'];
        else
            $this->setColor(new Color(array("red" => 255, "green" => 255, "blue" => 255)));
        if (array_key_exists('w', $kwargs))
            $this->_w = $kwargs['w'];
        else
            $this->_w = 1.0;
        if (self::$verbose === TRUE)
        {
            print($this);
            echo " constructed.\n";
        }
    }
    
    public function __destruct(){
        if (self::$verbose === TRUE)
        {
            print($this);
            echo " destructed.\n";
        }
    }

    public function __toString() {
     $p = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f"
        , $this->_x, $this->_y, $this->_z, $this->_w);
        if ( Vertex::$verbose == True ) {
            $p = $p . ", " . $this->_color;
        }
        return $p . " )";
    }


}
?>