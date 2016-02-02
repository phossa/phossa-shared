<?php
/*
 * Phossa Project
 *
 * @see         http://www.phossa.com/
 * @copyright   Copyright (c) 2015 phossa.com
 * @license     http://mit-license.org/ MIT License
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Pattern;

/**
 * Set object properties, trigger warning if unknown property found
 *
 * @trait
 * @package \Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.0
 * @since   1.0.3 added
 */
trait SetPropertiesTrait
{
    /**
     * Set properties, trigger warning if unknown property found
     *
     * @param  array $properties (optional) object properties
     * @access protected
     */
    protected function setProperties(array $properties = [])
    {
        foreach ($properties as $name => $value) {
            // set property
            if (property_exists($this, $name)) {
                $this->$name = $value;

            // unknown property found
            } else {
                trigger_error(
                    sprintf(
                        'unknown property "%s" for "%s"',
                        $name,
                        get_class($this)
                    ),
                    E_USER_WARNING
                );
            }
        }
    }
}
