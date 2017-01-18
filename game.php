<?php 
require_once("players.php"); //описание персонажей
require_once("team.php"); //описание команды
    
    
    
    //тестирование 
    echo "<br><hr> team_1 <br>";
    $team_1 = new Team('team_1');
    
    echo "<br><hr> team_2 <br>";
    $team_2 = new Team('team_2');
    echo "<br><hr> <br>";
    // 
    //бей врага!
    while($team_1->count_live_players > -1 && $team_2->count_live_players > -1) //its magic
    {
        echo "<tr>";
        $team_1->hit($team_2);
        $team_2->hit($team_1);
        echo "</tr>";
    }
// echo "</table>";
    
    //снова выводим состояние игроков, чтобы оценить изменения
    
    // echo "<br><hr><hr> team_1 <br>";
    // for($i = 0; $i <= 10; $i++)
    // {
    //     // var_dump($team_1->team[$i]);
    //     echo "get_class($team_1->team[$i]) ";
    // }
    // var_dump($team_1->count_live_players);
    
    // echo "<br><hr> team_2 <br>";
    // for($i = 0; $i <= 10; $i++)
    // {
    //     // var_dump($team_2->team[$i]);tem
    //     echo "get_class($team_2->team[$i]) ";
    // }
    // var_dump($team_2->count_live_players);
    echo "<hr>";
    if($team_1->count_live_players<0){
        echo "<br />" ."Team1 is dead" ."<br/>";
        echo "Team2 is win";
    } else{
        echo "<br> Team2 is dead" ."<br/>";
        echo "Team1 is win"; 
    }
    
    
?>