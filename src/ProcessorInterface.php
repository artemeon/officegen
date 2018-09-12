<?php
/*"******************************************************************************************************
 *   (c) ARTEMEON Management Partner GmbH
 *       Published under the MIT
 ********************************************************************************************************/

namespace Artemeon\Officegen;

/**
 * The processor generates a report based on a specific report id and provided data
 *
 * @author christoph.kappestein@artemeon.de
 */
interface ProcessorInterface
{
    /**
     * Starts the report generation. The reportId is a unique id which identifies the report. The outFile contains
     * the location where the generator writes the report. The data parameter contains additional data which is used
     * by the generator to create the report
     *
     * @param string $reportId
     * @param string $outFile
     * @param mixed|null $data
     * @return void
     */
    public function execute(string $reportId, string $outFile, $data = null);
}
