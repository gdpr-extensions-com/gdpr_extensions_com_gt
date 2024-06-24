<?php

declare(strict_types=1);

namespace GdprExtensionsCom\GdprExtensionsComGt\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class gdprgoogle_reviewlistTest extends UnitTestCase
{
    /**
     * @var \GdprExtensionsCom\GdprExtensionsComGt\Domain\Model\gdprgoogle_reviewlist|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \GdprExtensionsCom\GdprExtensionsComGt\Domain\Model\gdprgoogle_reviewlist::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty(): void
    {
        self::markTestIncomplete();
    }
}
