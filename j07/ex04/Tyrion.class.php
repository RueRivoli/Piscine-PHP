<?php

Class Tyrion extends Lannister
{
    public function With($p){
        if (get_parent_class($p) == "Lannister")
             print ("Not even if I'm drunk !");
        else
             print ("Let's do this .");
     }



}
?>