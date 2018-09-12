<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 11:54
 */

namespace InkoHX\php\discordpmmp\Config;


use InkoHX\php\discordpmmp\Main;

class DataFile
{
    /**
     * @param bool $keys
     * @return array
     */
    public static function getSetting(bool $keys = false): array
    {
        return Main::$instance->getConfig()->getAll($keys);
    }

    /**
     * @return array
     */
    public static function getOnlineSetting(): array
    {
        return Main::$instance->getConfig()->get('onlinemessage');
    }

    /**
     * @return array
     */
    public static function getOfflineSetting(): array
    {
        return Main::$instance->getConfig()->get('offlinemessage');
    }

    /**
     * @return array
     */
    public static function getWhitelistSetting(): array
    {
        return Main::$instance->getConfig()->get('whitelistmessage');
    }

    /**
     * @return array
     */
    public static function getServerChatSetting(): array
    {
        return Main::$instance->getConfig()->get('serverchat');
    }

    /**
     * @return array
     */
    public static function getEmbedSetting(): array
    {
        return Main::$instance->getConfig()->get('embed');
    }
}