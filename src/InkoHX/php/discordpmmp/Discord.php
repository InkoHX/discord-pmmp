<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 12:45
 */

namespace InkoHX\php\discordpmmp;


use InkoHX\php\discordpmmp\Config\Offline;
use InkoHX\php\discordpmmp\Config\Online;
use InkoHX\php\discordpmmp\Thread\SendEmbed;

class Discord
{
    public static function SendOnlineEmbed(): void
    {
        if (!Online::getOption()) return;
        $send = new SendEmbed(Online::getWebhookURL(), Online::getTitle(), Online::getField(), Online::getValue(), Online::getColor(), Online::getUsername(), Online::getAvatarURL());
        $send->start();
    }

    public static function SendOfflineEmbed(): void
    {
        if (!Offline::getOption()) return;
    }
}