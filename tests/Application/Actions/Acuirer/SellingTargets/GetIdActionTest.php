<?php

declare(strict_types=1);

namespace Tests\Application\Actions\Acuirer\SellingTargets;

use App\Application\Actions\ActionPayload;
use App\Application\Responder\Acquirer\SellingTarget\NameClearResponder;
use App\Application\Responder\Acquirer\SellingTarget\NonNameResponder;
use App\Domain\Acquirer\SellingTarget\NameClearSellingTarget;
use App\Domain\Acquirer\SellingTarget\NonNameSellingTarget;
use App\Domain\Acquirer\SellingTarget\Prefecture;
use App\Domain\Acquirer\SellingTarget\SellingTargetRepository;
use Tests\TestCase;

class GetIdActionTest extends TestCase
{
    public function testAction(): void
    {
        $app = $this->getAppInstance();

        $sellingTarget = new NonNameSellingTarget(...[
            'sellingTargetId' => 1,
            'catchPhrase' => 'キャッチフレーズ',
            'reason' => '売却理由',
            'prefecture' => Prefecture::Tokyo,
            'assets' => 100000000,
            'previousPeriodFiscalSales' => 10000000,
            'previousPeriodProfitOrLoss' => 10000000,
            'currentPeriodFiscalSales' => 10000000,
            'currentPeriodProfitOrLoss' => 10000000,
            'numberOfExecutive' => 5,
            'numberOfEmployee' => 30,
            'businessOverview' => '事業概要',
            'revenueStructure' => '収益構造',
            'salesCompositionRatio' => '売上構成比',
            'strengths' => '強み',
            'ceoName' => '金田餅太郎',
            'ceoPlaceOfOrigin' => Prefecture::Tokyo,
        ]);
        // ダミーリポジトリに差し替え
        $repositoryProphecy = $this->prophesize(SellingTargetRepository::class);
        $repositoryProphecy
            ->findById(1)
            ->willReturn($sellingTarget)
            ->shouldBeCalledOnce();
        $app->getContainer()->set(SellingTargetRepository::class, $repositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/api/acquirer/selling_targets/1');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = new ActionPayload(200, new NonNameResponder($sellingTarget)->toArray());
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }

    public function testActionShouldReturnNameClear(): void
    {
        $app = $this->getAppInstance();

        $sellingTarget = new NameClearSellingTarget(...[
            'sellingTargetId' => 1,
            'catchPhrase' => 'キャッチフレーズ',
            'reason' => '売却理由',
            'prefecture' => Prefecture::Tokyo,
            'assets' => 100000000,
            'previousPeriodFiscalSales' => 10000000,
            'previousPeriodProfitOrLoss' => 10000000,
            'currentPeriodFiscalSales' => 10000000,
            'currentPeriodProfitOrLoss' => 10000000,
            'numberOfExecutive' => 5,
            'numberOfEmployee' => 30,
            'businessOverview' => '事業概要',
            'revenueStructure' => '収益構造',
            'salesCompositionRatio' => '売上構成比',
            'strengths' => '強み',
            'ceoName' => '金田餅太郎',
            'ceoPlaceOfOrigin' => Prefecture::Tokyo,
        ]);
        // ダミーリポジトリに差し替え
        $repositoryProphecy = $this->prophesize(SellingTargetRepository::class);
        $repositoryProphecy
            ->findById(1)
            ->willReturn($sellingTarget)
            ->shouldBeCalledOnce();
        $app->getContainer()->set(SellingTargetRepository::class, $repositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/api/acquirer/selling_targets/1');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = new ActionPayload(200, new NameClearResponder($sellingTarget)->toArray());
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}
