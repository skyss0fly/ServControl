<?php

namespace skyss0fly\ServControl;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    private GamemodeManager $gamemodeManager;

    public function onEnable(): void {
        $this->gamemodeManager = new GamemodeManager($this);
        $this->getLogger()->info("ServControl plugin enabled!");
    }

    public function getGamemodeManager(): GamemodeManager {
        return $this->gamemodeManager;
    }
}
