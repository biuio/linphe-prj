<?php

namespace cnf;

/**
 * 数据库配置信息
 * @email 18716463@qq.com
 * @version 1.0.0
 */
class Conf
{

    public static $ENV;

    public static function env($name)
    {
        if ($name && isset(self::$ENV[$name])) {
            return self::$ENV[$name];
        }
        return "";
    }

    public static function preConfig()
    {
        $env = self::readEnv();
        self::preSelfConfig($env);
    }

    public static function preSelfConfig($env)
    {
        self::$ENV = $env;
    }

    private static function readEnv()
    {
        $envCacheFile = dirname(__DIR__) . '/.env.cache';
        $envFile = dirname(__DIR__) . '/.env';
        $env = file_exists($envCacheFile) ? json_decode(file_get_contents($envCacheFile), true) : [];
        if (!$env && file_exists($envFile)) {
            $file = fopen($envFile, 'r');
            while (!feof($file)) {
                $line = trim(fgets($file));
                if (!strlen($line) || $line == PHP_EOL || substr($line, 0, 1) == '#') {
                    continue;
                }
                list($key, $val) = explode('=', $line);
                if (!trim($key)) {
                    continue;
                }
                if (strpos($val, ',')) {
                    $val = explode(',', trim($val));
                    foreach ($val as &$v) {
                        $v = trim($v);
                    }
                } else {
                    $val = trim($val);
                }
                if ($val == 'true') {
                    $val = true;
                } elseif ($val == 'false') {
                    $val = false;
                }
                $env[trim($key)] = $val;
            }
            if ($env) {
                file_put_contents($envCacheFile, json_encode($env));
            }
        }
        return $env;
    }
}
