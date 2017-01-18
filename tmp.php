<?php
//trash
/*hit()
        $power = $this->armor - $this->damage * $this->speed /100;
              
        if($power->isAlive==false){
            return;
        }
        echo "$team attack $team2!<br />";
        echo get_class($team[$l]) . "Health is ".$team->health." now<br />";
        if($team->health<=0){
            $team->death($team);
            }
*/



//-----------
class Attacks extends Player {
    public function __construct(){
        $this->damage;
        $this->armor;
        $this->health;
        $this->speed;
        $this->accuracy;
    }
    public function start(){
        echo $this->health. "<br />";
        echo $this->power.  "<br />";
    }
    public function attack($team){
        parent::hit($power);
    }
}
//-----------



abstract class Player{
    
     public $health = 100,
            $power,
            $isAlive;
     static $speed,
            $damage,
            $accuracy;
           
	 	function hit($victim){
				//если броня есть
				if($victim->armor > 0){
					$victim->armor -= $this->damage*$this->speed/100;//вычесть броню из жизнией
					//если бро осталось меньше 0
					if($victim->armor < 0){
							$victim->health += $victim->armor;//вычесть броню из жизней
					}
				}
				else {
					$victim->health -= $this->damage*$this->speed/100;
				}

	 	}
    
    function death($team){
            $team->isAlive=false;
            echo "$team has died";
        }
    }


class Archer extends Player{
    protected $arrows;
    
    protected function shoot(){
        if (arrows>0){
            $this->arrows--;
            parent::hit($power);
        } else {
            echo "No ammo";
        }
    }
}

        

class Archer_People extends Archer{
    
    
    function __construct(){
    
    $this->accuracy = 10;
    $this->arrows = 30;
    $this->armor =5;
    $this->damage =5;
    $this->speed=5;
  
    
    }
    
    
    
}

class Warrios_People extends Player{
   
   function __construct(){
   
    $this->armor =10;
    $this->damage =5;
    $this->speed=7;
   }
}

class Rides_People extends Player{
   
    function __construct(){
   
    $this->armor =5;
    $this->damage =12;
    $this->speed=15;
    }
}




class Big_Orcs extends Player{
   
   function __construct(){
   
    $this->armor =0;
    $this->damage =7;
    $this->speed=5;
   }
//   echo "Количество стрел $this->arrows;"
}

class Small_Orcs extends Player{
    
     function __construct(){ 
    
    $this->damage =7;
    $this->armor =5;
    $this->speed=8;
     }
}



class Archer_Elves extends Archer{
   

   
    function __construct(){
    $this->arrows = 40;
    $this->damage =15;
    $this->armor =0;
    $this->speed=12;  
    
   
    
    }
}

class Warrios_Elves extends Player{
     function __construct(){
    
    $this->damage =15;
    $this->armor =0;
    $this->speed=10;  
     }
}



class Middle_Independens_Orcs extends Player{
   
    function __construct(){
   
    $this->damage =15;
    $this->armor =5;
    $this->speed=10;  
    }
}

 
class Warrios_Gnomes extends Player{
    function __construct(){
   
    $this->damage =15;
    $this->armor =15;
    $this->speed=3;  
    }
}

class Fallen_Elves extends Player{}
class People extends Player{}
class Exorsist extends Player{}

//-----------------
//-----------------
//game php
<?php

/*people
//лучники - archer
//воины - warriors
//всадники -riders
*/

/*orcs
big
small
*/

/*elves
//лучники - archer
//воины - warriors
*/


/*independed_orcs
//middle
*/

/*Exorsist
//воины - warriors
*/






    
// Создание первой команды

$team[$i] = array(9);
$team[0] = new Archer_People();
$team[1] = new Warrios_People();
$team[2] = new Rides_People();
$team[3] = new Big_Orcs();
$team[4] = new Small_Orcs();
$team[5] = new Archer_Elves();
$team[6] = new Middle_Independens_Orcs();
$team[7] = new Warrios_Gnomes();
$team[8] = new Exorsist;
// for($i=0;$i>=7;$i++){

foreach ($team as $i => $value){
    $k = rand(0,9);

    echo get_class($team[$k]) . "<br />";

}



echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";


    





    
// Создание второй команды

$team2[$j] = array(9);
$team2[0] = new Archer_People();
$team2[1] = new Warrios_People();
$team2[2] = new Rides_People();
$team2[3] = new Big_Orcs();
$team2[4] = new Small_Orcs();
$team2[5] = new Archer_Elves();
$team2[6] = new Middle_Independens_Orcs();
$team2[7] = new Warrios_Gnomes();
$team2[8] = new Exorsist();

foreach ($team2 as $j => $value){
    $l = rand(0,9);

   echo get_class($team2[$l]) . "<br />";
    // echo $team2->health;

}





function battle($team, $team2){
   while ($team[$i]->isAlive==true && $team2[$j]->isAlive==true){
        $team[$i]->attack($team2[$j]);
        $team2[$j]->attack($team[$i]);
    }
}




$team[$i] = new Attacks();
$team2[$j] = new Attacks();
battle($team[$i],$team2[$j]);

echo "<hr>";
show_propery($team[1]);











// $rases = array("Archer_People","Warrios_People","Rides_People","Big_Orcs","Elves_Archer","Middle_Independens_Orcs","Warrios_Gnomes");
// $rand_keys = array_rand($rases, 2);
// echo $rases[$rand_keys[0]] . "\n";
// echo $rases[$rand_keys[1]] . "\n";

?>
?>