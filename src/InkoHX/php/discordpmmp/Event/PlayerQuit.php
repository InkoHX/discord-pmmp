<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/13
 * Time: 20:48
 */

namespace InkoHX\php\discordpmmp\Event;


use InkoHX\php\discordpmmp\Discord;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;

class PlayerQuit implements Listener
{
    public function event(PlayerQuitEvent $event)
    {
        $player = $event->getPlayer();
        Discord::SendServerChat("**" . $player->getName() . "**がサーバーから退出しました。");
    }
}