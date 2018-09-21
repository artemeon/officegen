<?php
/*"******************************************************************************************************
 *   (c) ARTEMEON Management Partner GmbH
 *       Published under the MIT
 ********************************************************************************************************/

namespace Artemeon\Officegen;

/**
 * Describes a generator which generates a report. In general there is no limitation how the generator creates the
 * report i.e. it can call an process or insert a job into message queue, it is only important that the generator is
 * blocking. This means the method should return only if the outFile was written.
 *
 * @author christoph.kappestein@artemeon.de
 */
interface GeneratorInterface
{
    /**
     * @param string $reportId
     * @param string $outFile
     * @param mixed|null $data
     * @return void
     * @throws ReportNotFoundException
     */
    public function generate(string $reportId, string $outFile, $data = null);
}
