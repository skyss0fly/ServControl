namespace skyss0fly\ServControl;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\Server;

class GamemodeManager {

    private string $defaultGamemode;

    public function __construct(PluginBase $plugin) {
        $this->defaultGamemode = $plugin->getConfig()->get("DefaultGamemode"); 
    }

    public function getDefaultGamemode(): string {
        return $this->defaultGamemode;
    }

    /*
    For Later Use
    public function setDefaultGamemode(string $gamemode): void {
        $this->defaultGamemode = $gamemode;
    }
    */

    public function setPlayerToGamemode(Player $player, int $gamemode): bool {
        if (!$player->isOnline()) {
            return false;
        }
        $player->setGamemode($gamemode);
        return true;
    }
}
