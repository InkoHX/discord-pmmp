<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 14:04
 */

namespace InkoHX\php\discordpmmp\Event;


use InkoHX\php\discordpmmp\Discord;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class PlayerChat implements Listener
{
    public function event(PlayerChatEvent $event): void
    {
        Discord::SendServerChat($event->getPlayer()->getName() . ": " . $event->getMessage());
    }
}