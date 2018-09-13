<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 11:23
 */

namespace InkoHX\php\discordpmmp;


use InkoHX\php\discordpmmp\Event\PlayerChat;
use InkoHX\php\discordpmmp\Event\PlayerJoin;
use InkoHX\php\discordpmmp\Event\PlayerQuit;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    const START = "
     §3____  _                       _ §b____  __  __ __  __ ____  
    §3|  _ \(_)___  ___ ___  _ __ __| |§b  _ \|  \/  |  \/  |  _ \ 
    §3| | | | / __|/ __/ _ \| '__/ _` |§b |_) | |\/| | |\/| | |_) |
    §3| |_| | \__ \ (_| (_) | | | (_| |§b  __/| |  | | |  | |  __/ 
    §3|____/|_|___/\___\___/|_|  \__,_|§b_|   |_|  |_|_|  |_|_|    

                    §aLICENSE§7: §cMIT
                     §bDev§7: InkoHX
         GitHub: https://long.inkohx.xyz/GitHub
                 
    ";
    /* @var Main */
    public static $instance;

    public function onLoad()
    {
        static::$instance = $this;
        $this->saveDefaultConfig();
    }

    public function onEnable()
    {
        Discord::SendOnlineEmbed();
        $this->registerEvents();
        $this->getLogger()->info(static::START);
    }

    public function onDisable()
    {
        Discord::SendOfflineEmbed();
    }

    private function registerEvents(): self
    {
        $plm = $this->getServer()->getPluginManager();
        $plm->registerEvents(new PlayerChat(), $this);
        $plm->registerEvents(new PlayerJoin(), $this);
        $plm->registerEvents(new PlayerQuit(), $this);
        return $this;
    }
}