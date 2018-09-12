<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 13:37
 */

namespace InkoHX\php\discordpmmp\Config;


class Offline
{
    public static function getOption(): bool
    {
        $data = DataFile::getOfflineSetting();
        return $data['send'];
    }
}