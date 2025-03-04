<?php
namespace skyss0fly\ServControl;

use pocketmine\plugin\PluginBase;

use ServControl\GamemodeManager;

class Main {
function __construct(){
$gamemodeManager = new GamemodeManager($this);
}
}
