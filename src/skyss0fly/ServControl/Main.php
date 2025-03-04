<?php

namespace skyss0fly\ServControl;

use pocketmine\plugin\PluginBase;
use skyss0fly\ServControl\GamemodeManager;
use skyss0fly\ServControl\AuthCommand;

class Main extends PluginBase {

    private GamemodeManager $gamemodeManager;
private AuthCommand $authCommand;
    
    public function onEnable(): void {
        $this->gamemodeManager = new GamemodeManager($this);
        $this->authCommand = new AuthCommand($this);
        $this->getServer()->getCommandMap()->register("auth", $this->authCommand);
        $this->getLogger()->info("ServControl plugin enabled!");
    }

    public function getGamemodeManager(): GamemodeManager {
        return $this->gamemodeManager;
    }
}
