<?php

declare(strict_types=1);

namespace App\Application\Actions\SellingTargets;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;

class GetIdAction extends Action
{
    public function action(): Response
    {
        $id = (int) $this->resolveArg('id');
        // TODO
        return $this->respondWithData([$id]);
    }
}
