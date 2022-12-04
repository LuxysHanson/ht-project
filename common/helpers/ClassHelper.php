<?php

namespace common\helpers;

class ClassHelper
{

    /**
     * @param string $class
     * @param string $namespace
     * @param string $layer
     * @return string
     */
    public static function getRelatedClass($class, $namespace, $layer = '')
    {
        $class = explode(DIRECTORY_SEPARATOR, $class);
        $className = array_pop($class);
        $className = str_replace('Repository', $layer, $className);
        array_pop($class);
        array_push($class, $namespace);
        array_push($class, $className);

        return implode(DIRECTORY_SEPARATOR, $class);
    }

}
