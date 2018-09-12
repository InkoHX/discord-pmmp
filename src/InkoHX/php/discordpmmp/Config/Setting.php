<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 12:34
 */

namespace InkoHX\php\discordpmmp\Config;


class Setting
{
    /**
     * @return bool
     */
    public static function OnlineSendEmbed(): bool
    {
        $data = DataFile::getOnlineSetting();
        return $data['send'];
    }

    /**
     * @return string
     */
    public static function OnlineWebhookURL(): string
    {
        $data = DataFile::getOnlineSetting();
        return $data['webhook'];
    }
}