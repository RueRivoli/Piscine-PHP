<?php

Class Jaime extends Lannister
{

    public function With($p){
        if (get_class($p) == "Sansa")
             print ("Let's do this.");
        else if (get_class($p) == "Cersei")
             print ("With pleasure, but only in a tower in Wintefrell, then."); 
        else 
             print ("Not even if I'm drunk !");
     }



}
?>