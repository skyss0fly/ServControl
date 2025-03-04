<?php

namespace skyss0fly\ServControl;

use skyss0fly\ServControl\GamemodeManager;
use pocketmine\event\Listener;

class GamemodeChecker implements Listener {

  function getPlayersGamemode(string $player){
return $player->getGamemode();
    
  }
}
