<?php

namespace App\Dictionary;

class ModelDictionaryManager
{
    public function getModelDictionary($modelKey)
    {
        try
        {
            $clazz = 'App\\Dictionary\\' . ucwords($modelKey) . 'Dictionary';
            return new $clazz();
        } catch (Exception $ex)
        {
            return false;
        }
    }
}
