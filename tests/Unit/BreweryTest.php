<?php
class BreweryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testBreweryList()
    {
        $brewery = new \App\Brewery\Brewery();
        $breweries = $brewery->getBreweryList();
        $this->assertNotEmpty($breweries);
        $this->assertEquals(\App\Http\Resources\Brewery::class, get_class($breweries->collection->first()));
    }
}
