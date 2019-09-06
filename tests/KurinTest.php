<?php

use IAmJoshKendall\Kurin;
use PHPUnit\Framework\TestCase;

final class KurinTest extends TestCase
{
    public function testCanImportFileAndConvertToArray()
    {
        $results = Kurin::fromCSV('tests/data/test.csv', ['id', 'title', 'content']);
        $this->assertCount(2, $results);
    }

    public function testCanProperlyFillArray()
    {
        $results = Kurin::fromCSV('tests/data/test.csv', ['id', 'title', 'content']);
        $this->assertCount(3, $results[0]);
    }
}
