<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 14:09
 */

namespace InkoHX\php\discordpmmp\Config;


class ServerChat
{
    /**
     * @return bool
     */
    public static function getOption(): bool
    {
        $data = DataFile::getServerChatSetting();
        return $data['send'];
    }

    /**
     * @return string
     */
    public static function getWebhookURL(): string
    {
        $data = DataFile::getServerChatSetting();
        return $data['webhook'];
    }

    /**
     * @return string
     */
    public static function getUsername(): string
    {
        $data = DataFile::getServerChatSetting();
        return $data['username'];
    }

    /**
     * @return string
     */
    public static function getAvatarURL(): string
    {
        $data = DataFile::getServerChatSetting();
        return $data['avatarurl'];
    }
}