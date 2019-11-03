<?php

namespace Tests\Unit\Domain\QueryHandler;

use Exception;
use Medzoner\Domain\Query\ListJobBoardQuery;
use Medzoner\Domain\QueryHandler\ListJobBoardQueryHandler;
use Medzoner\GlobalBundle\Provider\JobBoard\JobBoardProvider;
use Medzoner\GlobalBundle\Services\JobBoardService;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;

/**
 * Class ListJobBoardQueryHandlerTest
 */
class ListJobBoardQueryHandlerTest extends TestCase
{

    /**
     * @var ObjectProphecy
     */
    private $jobBoardService;

    protected function setUp(): void
    {
        $this->jobBoardService = $this->prophesize(JobBoardService::class);
    }

    public function test_success()
    {
        $query = (new ListJobBoardQuery());
        $queryHandler = new ListJobBoardQueryHandler(new JobBoardService(new JobBoardProvider()));
        $query->getParam('no');
        $jobs = $queryHandler->handle($query);
        $this->assertCount(6, $jobs);
    }

    public function test_failed()
    {
        $query = (new ListJobBoardQuery(['fake' => 'nothing']));
        $queryHandler = new ListJobBoardQueryHandler($this->jobBoardService->reveal());
        $query->getParam('no');
        $jobs = $queryHandler->handle($query);
        $this->assertEquals($jobs, null);
    }
}
