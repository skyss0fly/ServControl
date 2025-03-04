<?php
namespace skyss0fly\ServControl;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;

class GamemodeManager {

public $defaultGamemode;

  function __construct($defaultGamemode){
$this->defaultGamemode = $defaultGamemode;
    $this->defaultGamemode = $this->getConfig()->get("DefaultGamemode");    
  }
  
  public function getDefaultGamemode(): bool {
return $this->defaultGamemode;
  }

  /*
  FOR LATER USAGE
public function setDefaultGamemode(string $str) {
$this->defaultGamemode = $str;
}
  */
public function setPlayerToGamemode(string $player, string $gamemode){
if (!$player instanceof Player) {
return false;
}
else {
// set players gamemode
}
}
}

?>
