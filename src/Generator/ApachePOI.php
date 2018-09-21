<?php
/*"******************************************************************************************************
 *   (c) ARTEMEON Management Partner GmbH
 *       Published under the MIT
 ********************************************************************************************************/

namespace Artemeon\Officegen\Generator;

use Artemeon\Officegen\GeneratorInterface;
use Artemeon\Officegen\ReportNotFoundException;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Generator which uses a jar to generate a report through the apache POI library
 *
 * @author christoph.kappestein@artemeon.de
 */
class ApachePOI implements GeneratorInterface
{
    /**
     * @var string
     */
    protected $javaExec;

    /**
     * @var string
     */
    protected $jarFile;

    /**
     * @param string $javaExec
     * @param string $jarFile
     */
    public function __construct(string $javaExec, string $jarFile)
    {
        $this->javaExec = $javaExec;
        $this->jarFile = $jarFile;
    }

    /**
     * @inheritdoc
     */
    public function generate(string $reportId, string $outFile, $data = null)
    {
        $process = new Process(['java', '-jar', $this->jarFile, '-r', $reportId, '-o', $outFile]);

        if (!empty($data)) {
            $process->setInput(json_encode($data) . "\n");
        }

        $process->run();

        if (!$process->isSuccessful()) {
            if ($process->getExitCode() === 4) {
                throw new ReportNotFoundException("Report " . $reportId . " does not exist");
            } else {
                throw new ProcessFailedException($process);
            }
        }
    }
}
