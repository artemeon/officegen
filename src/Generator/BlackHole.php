<?php
/*"******************************************************************************************************
 *   (c) ARTEMEON Management Partner GmbH
 *       Published under the MIT
 ********************************************************************************************************/

namespace Artemeon\Officegen\Generator;

use Artemeon\Officegen\GeneratorInterface;

/**
 * Generator which does nothing, simply for testing purpose
 *
 * @author christoph.kappestein@artemeon.de
 */
class BlackHole implements GeneratorInterface
{
    /**
     * @inheritdoc
     */
    public function generate(string $reportId, string $outFile, $data = null)
    {
        file_put_contents($outFile, json_encode([
            "reportId" => $reportId,
            "outFile" => $outFile,
            "data" => $data,
        ]));
    }
}
