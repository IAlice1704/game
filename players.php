<?php
	abstract class Player{
		public $armor;
	 	public $health = 100;
		public $damage; // урон
		public $speed; //скорость

		//а не труп ли я?
		function is_sterben(){
			if($this->health <= 0)
				return true;
			else return false;
		}

	 	function hit($victim){
				//если броня есть
				if($victim->armor > 0){
					$victim->armor -= $this->damage*$this->speed/100;//вычесть из жизней
					//если осталось меньше 0
					if($victim->armor < 0){
							$victim->health += $victim->armor;//вычесть ее из жизней
					}
				}
				else {
					$victim->health -= $this->damage*$this->speed/100;
				}
	 	}

	 	//---------

	}

	//traits
		trait Archer {
		    public $arrows;
		    public $accuracy; // меткость

		    function hit($victim){
		        parent::hit($victim);
		        $this->arrows-=1;
		    }

			function show_property(){
				parent::show_property();
				echo "<br> arrows == $this->arrows";
			}

		}

	//humans
		class Human extends Player{

		}

		class Human_Archer extends Human {
		    use Archer;

		    function __construct(){
		        $this->armor = 5; //броня
		        $this->accuracy = 10; // меткость
		        $this->arrows = 30; //стрелы
		        $this->damage = 5; // урон
		        $this->speed = 5; //скорость
		    }

		}

		class Human_Warrior extends Human {

		    function __construct(){
		        $this->armor = 10; //броня
		        $this->damage = 5; // урон
		        $this->speed = 7; //скорость
		    }


		}

		class Human_Rider extends Human {
		    function __construct(){
		        $this->armor = 5; //броня
		        $this->damage = 12; // урон
		        $this->speed = 15; //скорость
		    }
		}


	//orcs
		class Orc extends Player{
			//
		}

		class Big_Orc extends Orc{
		    function __construct(){
		        $this->armor = 0; //броня
		        $this->damage = 20; // урон
		        $this->speed = 5; //скорость
		    }
		}
		class Lit_Orc extends Orc{
		    function __construct(){
		        $this->armor = 5; //броня
		        $this->damage = 7; // урон
		        $this->speed = 8; //скорость
		    }
		}

	//free orcs
		class Free_Orc extends Player{
			function __construct()
		    {
		        $this->armor = 5; //броня
		        $this->damage = 15; // урон
		        $this->speed = 10; //скорость
		    }
		}

	//elfs
		class Elf extends Player{
			//
		}

		class Elf_Archer extends Elf {
		    use Archer;

		    function __construct(){
		        $this->armor = 0; //броня
		        $this->damage = 15; // урон
		        $this->speed = 12; //скорость
		        $this->arrows=40;
		        $this->accuracy = 10; // меткость
		    }
		}

		class Elf_Warrior extends Elf {
		    function __construct()
		    {
		        $this->armor = 0; //броня
		        $this->damage = 15; // урон
		        $this->speed = 10; //скорость
		    }
		}

	//fallen_elf
		class Fallen_ELf extends Player{
			function __construct()
		    {
		        $this->armor = 0; //броня
		        $this->damage = 15; // урон
		        $this->speed = 10; //скорость
		    }
		}

	//gnoms
		class Gnome_Warior extends Player{
			function __construct()
		    {
		        $this->armor = 15; //броня
		        $this->damage = 15; // урон
		        $this->speed = 3; //скорость
		    }
		}



	//wizard
		class Wizard extends Player{
			function __construct()
		    {
		        $this->armor = 0; //броня
		        $this->damage = 15; // урон
		        $this->speed = 10; //скорость
		    }
		}