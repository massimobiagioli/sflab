<?php

namespace App\Module\Dummy;

use App\Module\Dummy\Dummy;

class DummyDefaultImpl implements Dummy {
    
    public function execute()
    {
        return "Executed from Default Dummy Implementation";
    }

}