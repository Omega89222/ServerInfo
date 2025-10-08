<?php

namespace Omega892\ServerInfo;

use Omega892\ServerInfo\Commands\ServerInfoCommand;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    protected function onEnable(): void
    {
        $this->getServer()->getCommandMap()->register("", new ServerInfoCommand($this));
    }
}