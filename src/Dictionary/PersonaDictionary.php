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

    protected function getDataTableFields()
    {
        return self::$DATATABLE_FIELDS;
    }

    protected function adaptDataTableResultRow($model)
    {
        return [
            $model->getId(),
            $model->getNominativo(),
            $model->getIndirizzo(),
            '<div>Azioni</div>'
        ];
    }

}
