<?php

namespace Tests\Unit\Domain\QueryHandler;

use Medzoner\Domain\Query\ListJobBoardQuery;
use Medzoner\Domain\QueryHandler\ListJobBoardQueryHandler;
use Medzoner\GlobalBundle\Model\JobBoard\JobBoard;
use Medzoner\GlobalBundle\Model\JobBoard\JobBoardContent;
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
        $query->getParams();
        $jobs = $queryHandler->handle($query);
        $this->assertCount(6, $jobs);
        $this->assertInstanceOf(JobBoard::class, $jobs->offsetGet(0));
        $this->assertEquals(null, $jobs->offsetGet(0)->getTitle());
        $this->assertInstanceOf(JobBoardContent::class, $jobs->offsetGet(0)->getContents()->offsetGet(0));
        $this->assertEquals('Langages', $jobs->offsetGet(0)->getContents()->offsetGet(0)->getTitle());
        $this->assertEquals('PHP, javascript/NodeJs, HTML, CSS', $jobs->offsetGet(0)->getContents()->offsetGet(0)->getContent());
        $this->assertEquals(null, $jobs->offsetGet(0)->getContents()->offsetGet(0)->getDescription());
        $this->assertEquals('/images/php/elephpant_50_35.png', $jobs->offsetGet(0)->getContents()->offsetGet(0)->getLogos()[0]);
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
