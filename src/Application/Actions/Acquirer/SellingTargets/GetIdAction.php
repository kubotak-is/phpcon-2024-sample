<?php

declare(strict_types=1);

namespace App\Application\Actions\Acquirer\SellingTargets;

use App\Application\Actions\Action;
use App\Application\Responder\Acquirer\SellingTarget\NameClearResponder;
use App\Application\Responder\Acquirer\SellingTarget\NonNameResponder;
use App\Domain\Acquirer\SellingTarget\DomainService;
use App\Domain\Acquirer\SellingTarget\NameClearSellingTarget;
use App\Domain\Acquirer\SellingTarget\NonNameSellingTarget;
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
        $sellingTarget = $this->sellingTargetDomainService->getById($id);
        if ($sellingTarget->isNameClear()) {
            // @phpstan-ignore-next-line
            assert($sellingTarget instanceof NameClearSellingTarget);
            return $this->respondWithData(new NameClearResponder($sellingTarget)->toArray());
        }
        assert($sellingTarget instanceof NonNameSellingTarget);
        return $this->respondWithData(new NonNameResponder($sellingTarget)->toArray());
    }
}
