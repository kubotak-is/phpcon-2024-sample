<?php

declare(strict_types=1);

namespace App\Application\Actions\Seller\SellingTargets;

use App\Application\Actions\Action;
use App\Domain\Seller\SellingTarget\DomainService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class GetIdAction extends Action
{
    public function __construct(
        private readonly DomainService $sellingTargetDomainService,
        LoggerInterface $logger
    ) {
        parent::__construct($logger);
    }

    public function action(): Response
    {
        $id = (int) $this->resolveArg('id');
        $result = $this->sellingTargetDomainService->getById($id);
        return $this->respondWithData(['id' => $result]);
    }
}
