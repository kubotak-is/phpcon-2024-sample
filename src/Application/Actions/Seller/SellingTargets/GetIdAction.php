<?php

declare(strict_types=1);

namespace App\Application\Actions\Seller\SellingTargets;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;

class GetIdAction extends Action
{
    public function action(): Response
    {
        $id = (int) $this->resolveArg('id');
        // 売り手独自の処理がある想定
        return $this->respondWithData(['id' => $id]);
    }
}
