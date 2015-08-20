<?php

namespace jamesiarmes\PEWS\API\Type;

/**
 * Class representing DistinguishedGroupByType
 *
 * Allows consumers to access standard groupings for FindItem queries. This is in
 *  contrast to the arbitrary (custom) groupings available via the t:GroupByType
 * XSD Type: DistinguishedGroupByType
 *
 * @method DistinguishedGroupByType getStandardGroupBy()
 * @method DistinguishedGroupByType setStandardGroupBy(string $standardGroupBy)
 */
class DistinguishedGroupByType extends BaseGroupByType
{

    /**
     * @property string $standardGroupBy
     */
    protected $standardGroupBy = null;
}
