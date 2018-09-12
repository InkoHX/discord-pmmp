<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 12:45
 */

namespace InkoHX\php\discordpmmp;


use InkoHX\php\discordpmmp\Config\Setting;

class Discord
{
    public static function SendOnlineEmbed()
    {
        if (!Setting::OnlineSendEmbed()) return;

    }
}