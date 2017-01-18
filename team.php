<?php
require_once("players.php");//подключение рас
define('COUNT_PLAYERS', 10); //количество игроков в команде
class Team{
        public $name_team;
    
        // public $unit = '';
        
        public $races = array('Human_Warrior',
                'Human_Archer',
                'Human_Rider',
                'Big_Orc',
                'Lit_Orc',
                'Elf_Archer',
                'Elf_Warrior',
                'Fallen_ELf',
                'Free_Orc',
                'Gnome_Warior');
                
                // foreach ($races as $value) {
                //     $unit .= $value;
                // }     
                    
        public $team = []; //основной массив игроков команды
        public $count_live_players = 10;
        //
        function __construct($name){
            $this->name_team = $name;
// echo <<<END
// <table border = '1'>
// END;
            for($i = 0; $i <= COUNT_PLAYERS; $i++)
            {
                $race = mt_rand(0,9);     
                $this->team[$i] = new $this->races[$race]();
                echo "<br>";
                echo $this->races[$race];
                echo "<br>";    

            }
            
                    
                    // foreach ($races as $value) {
                    // $unit .= $value;
                    // }
// echo <<<END
// </table>
// END;

        }
        

        
        
       function hit($enemy_team){

            $index_enemy = mt_rand(-1,10); //индекс противника в чужой команде
            $index_ally = mt_rand(-1,10); //индекс соратника в массиве
            
            //пока просто нанесем удар
            if( isset($this->team[$index_ally]) && isset($enemy_team->team[$index_enemy]) ){  //проверка на существование выбранных игроков в команде
                $this->team[$index_ally]->hit($enemy_team->team[$index_enemy]);
                if($enemy_team->team[$index_enemy]->is_sterben()) {
                    unset($enemy_team->team[$index_enemy]);
                    // echo "unit";
                    // echo get_class($enemy_team->team[$index_enemy]);
                    echo "<br>";
                    echo "<span>";
                    print_r($enemy_team->team[$index_ally]);
                    echo " is dead";
                    echo " ";
                    echo "[$enemy_team->name_team]";
                    echo " </span>";
                    echo " <br";
                    $enemy_team->count_live_players--;
                }
                    
            }
            
        }



}

?>