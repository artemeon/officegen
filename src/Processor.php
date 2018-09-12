<?php
/*"******************************************************************************************************
 *   (c) ARTEMEON Management Partner GmbH
 *       Published under the MIT
 ********************************************************************************************************/

namespace Artemeon\Officegen;

/**
 * Processor
 *
 * @author christoph.kappestein@artemeon.de
 */
class Processor
{
    /**
     * @var GeneratorInterface
     */
    protected $generator;

    /**
     * @param GeneratorInterface $generator
     */
    public function __construct(GeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @inheritdoc
     */
    public function execute(string $reportId, string $outFile, $data = null)
    {
        // remove any existing file
        if (is_file($outFile)) {
            unlink($outFile);
        }

        // generate the report
        $this->generator->generate($reportId, $outFile, $data);

        // check whether the file was written by the generator
        if (!is_file($outFile)) {
            throw new ProcessingFailedException("Could not generate report");
        }
    }
}
