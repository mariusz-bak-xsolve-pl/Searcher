<?php


namespace Model\FilterModel;

use XSolve\Searcher\Model\FilterModel\DateTimeRangeFilterModel;

class DateTimeRangeFilterModelTest extends \PHPUnit_Framework_TestCase
{
    public function testImposedMethodWithoutValues()
    {
        $this->assertFalse($this->getDateTimeRangeFilterModel()->isImposed());
    }

    /**
     * @dataProvider dateTimeProvider
     */
    public function testImposedMethod($startingValue, $endingValue, $expectedResult)
    {
        $this->assertEquals(
            $this
                ->getDateTimeRangeFilterModel()
                ->setStartingDateTime($startingValue)
                ->setEndingDateTime($endingValue)
                ->isImposed(),
            $expectedResult
        );
    }

    /**
     * @return array
     */
    public function dateTimeProvider()
    {
        return [
            [new \DateTime(), new \DateTime(), true],
            [new \DateTimeImmutable(), new \DateTimeImmutable(), true],
            [new OtherCustomDateTimeClass(), new OtherCustomDateTimeClass(), true],
        ];
    }

    private function getDateTimeRangeFilterModel()
    {
        return new DateTimeRangeFilterModel();
    }
}

class OtherCustomDateTimeClass extends \DateTime
{
}
