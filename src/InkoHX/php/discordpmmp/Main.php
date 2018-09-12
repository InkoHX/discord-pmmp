<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 11:23
 */

namespace InkoHX\php\discordpmmp;


use InkoHX\php\discordpmmp\Event\PlayerChat;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
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
    }

    public function onDisable()
    {
        Discord::SendOfflineEmbed();
    }

    private function registerEvents(): self
    {
        $plm = $this->getServer()->getPluginManager();
        $plm->registerEvents(new PlayerChat(), $this);
        return $this;
    }
}