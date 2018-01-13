<?php

namespace App\Module\Dummy;

use App\Module\Dummy\DummyDefaultImpl;

class DummyFactory {
    
    public static function createDummy($type) {
        if ($type === 'default') {
            return new DummyDefaultImpl();
        }
        return false;
    }
    
}

