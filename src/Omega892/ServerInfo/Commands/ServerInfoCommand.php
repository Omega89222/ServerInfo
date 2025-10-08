<?php

namespace Omega892\ServerInfo\Commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class ServerInfoCommand extends Command {

    public function __construct()
    {
        parent::__construct("serverinfo", "See information of server", "/serverinfo", ["server"]);
        $this->setPermission("serverinfo.cmd.use");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        $name = Server::getInstance()->getName() ?? "";
        $versionMc  = Server::getInstance()->getVersion();
        $ip = Server::getInstance()->getIP();
        $ipV6 = Server::getInstance()->getIPV6();
        $port = Server::getInstance()->getPort();
        $motd = Server::getInstance()->getMotd();
        $maxPlayers = Server::getInstance()->getMaxPlayers();
        $players = Server::getInstance()->getOnlinePlayers();
        $playersOnline = count($players);
        $tps = Server::getInstance()->getTicksPerSecond();

        $messageInfo = [
            "Information of $name",
            "Server version: §e$versionMc",
            "IP: §e$ip",
            "IP Address: §e$ipV6",
            "Port: §e$port",
            "Motd: §e$motd",
            "Players online: §e{$playersOnline}/$maxPlayers",
            "TPS: §e$tps",
        ];

        $sender->sendMessage(implode("\n§r", $messageInfo));
    }
}