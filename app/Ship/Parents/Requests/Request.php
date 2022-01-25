<?php

namespace App\Ship\Parents\Requests;

use Apiato\Core\Abstracts\Requests\Request as AbstractRequest;

abstract class Request extends AbstractRequest
{
    public function getData(): array
    {
        return $this->validated();
    }
}
