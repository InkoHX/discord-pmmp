<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/14
 * Time: 17:38
 */

namespace InkoHX\php\discordpmmp\Event;


use InkoHX\php\discordpmmp\Discord;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;

class PlayerDeath implements Listener
{
    public function event(PlayerDeathEvent $event)
    {
        Discord::SendServerChat($event->getPlayer()->getName() . "が死にました。");
    }
}