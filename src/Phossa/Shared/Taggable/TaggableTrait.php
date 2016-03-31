<?php
/**
 * Phossa Project
 *
 * PHP version 5.4
 *
 * @category  Library
 * @package   Phossa\Shared
 * @copyright 2015 phossa.com
 * @license   http://mit-license.org/ MIT License
 * @link      http://www.phossa.com/
 */
/*# declare(strict_types=1); */

namespace Phossa\Shared\Taggable;

/**
 * Implementation of TaggableInterface
 *
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     TaggableInterface
 * @version 1.0.9
 * @since   1.0.9 added
 */
trait TaggableTrait
{
    /**
     * tags
     *
     * @var    array
     * @access protected
     */
    protected $tags = [];

    /**
     * {@inheritDoc}
     */
    public function addTag(/*# string */ $tag)
    {
        if (!$this->hasTag($tag)) {
            $this->tags[] = (string) $tag;
        }
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasTag(/*# string */ $tag)/*# : bool */
    {
        return in_array((string) $tag, $this->tags);
    }

    /**
     * {@inheritDoc}
     */
    public function setTags(array $tags)
    {
        $this->tags = array_unique($tags);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTags()/*# : array */
    {
        return $this->tags;
    }

    /**
     * {@inheritDoc}
     */
    public function hasTags(array $tags)/*# : array */
    {
        return array_intersect($this->tags, $tags);
    }

    /**
     * {@inheritDoc}
     */
    public function removeTag(/*# string */ $tag)
    {
        if ($this->hasTag($tag)) {
            $this->tags = array_diff($this->tags, [(string) $tag]);
        }
        return $this;
    }
}
