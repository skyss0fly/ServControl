<?php
namespace skyss0fly\ServControl;

use pocketmine\event\Listener;
use pocketmine\player\Player;

class GamemodeChecker implements Listener {

    public function getPlayersGamemode(Player $player): int {
        return $player->getGamemode();
    }


}
