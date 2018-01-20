<?php

namespace App\Dictionary;

use App\Dictionary\ModelDictionary;
use App\Dictionary\BaseDictionary;

class PersonaDictionary extends BaseDictionary implements ModelDictionary
{
    private static $DATATABLE_FIELDS = [
        'id',
        'nominativo',
        'indirizzo'
    ];
    
    public function getDataTableFields()
    {
        return self::$DATATABLE_FIELDS;
    }

}
