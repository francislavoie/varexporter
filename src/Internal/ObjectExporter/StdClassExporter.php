<?php

declare(strict_types=1);

namespace Brick\VarExporter\Internal\ObjectExporter;

use Brick\VarExporter\Internal\ObjectExporter;

/**
 * Handles stdClass objects.
 *
 * @internal This class is for internal use, and not part of the public API. It may change at any time without warning.
 */
class StdClassExporter extends ObjectExporter
{
    /**
     * {@inheritDoc}
     */
    public function supports($object, \ReflectionObject $reflectionObject) : bool
    {
        return $object instanceof \stdClass;
    }

    /**
     * {@inheritDoc}
     */
    public function export($object, \ReflectionObject $reflectionObject) : array
    {
        $exported = $this->exporter->exportArray((array) $object);

        $exported[0] = '(object) ' . $exported[0];

        return $exported;
    }
}