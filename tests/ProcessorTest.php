<?php
/*
 * This file is part of the Artemeon Core - Web Application Framework.
 *
 * (c) Artemeon <www.artemeon.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artemeon\Officegen\Tests;

use Artemeon\Officegen\Generator\BlackHole;
use Artemeon\Officegen\Processor;
use PHPUnit\Framework\TestCase;

/**
 * ProcessorTest
 *
 * @author christoph.kappestein@artemeon.de
 */
class ProcessorTest extends TestCase
{
    public function testExecute()
    {
        $reportFile = __DIR__ . "/test.json";

        $generator = new BlackHole();
        $processor = new Processor($generator);

        $processor->execute("TestReport", $reportFile, ["foo" => "bar"]);

        $data = json_decode(file_get_contents($reportFile), true);

        $this->assertArrayHasKey("reportId", $data);
        $this->assertArrayHasKey("outFile", $data);
        $this->assertArrayHasKey("data", $data);
        $this->assertEquals("TestReport", $data["reportId"]);
        $this->assertEquals($reportFile, $data["outFile"]);
        $this->assertEquals(["foo" => "bar"], $data["data"]);
    }
}

