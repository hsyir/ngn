<?php


namespace Hsy\Ngn\Tests;


use Hsy\Ngn\Center;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use function PHPUnit\Framework\assertTrue;

class SearchTest extends TestCase
{

    use RefreshDatabase;


    /** @test */
    public function search_not_exists_number()
    {
        $ngn = new Center;
        $this->expectExceptionMessage("PreNumber Not Defined");
        $ngn->search("071", "1111", "9595");
    }

    /** @test */
    public function search_driver_not_found()
    {
        $ngn = new Center;
        $this->expectExceptionMessage("Driver Class Not Found");
        $ngn->search("031", "7777", "9595");
    }


    /** @test */
    public function database_search()
    {
        $ngn = new Center();
        $result = $ngn->search("021", "9999", "1111");
        $this->assertEquals("1111",$result->number);
    }

    /** @test */
    public function database_search_not_found()
    {
        $ngn = new Center();
        $result = $ngn->search("021", "9999", "2525");

        $this->assertNull($result);
    }

}
