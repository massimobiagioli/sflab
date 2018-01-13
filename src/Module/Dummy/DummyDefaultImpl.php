<?php

namespace App\Module\Dummy;

use App\Module\Dummy\Dummy;

class DummyDefaultImpl implements Dummy {
    
    private $counter;
    
    public function execute()
    {
        $this->counter++;
        return 'Executed from Default Dummy Implementation' . $this->counter;
    }

}