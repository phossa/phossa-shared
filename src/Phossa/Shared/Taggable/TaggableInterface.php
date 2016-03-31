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
 * TaggableInterface
 *
 * @package Phossa\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @version 1.0.9
 * @since   1.0.9 added
 */
interface TaggableInterface
{
    /**
     * Add a single tag
     *
     * @param  string $tag
     * @return this
     * @access public
     */
    public function addTag(/*# string */ $tag);

    /**
     * Has this tag ?
     *
     * @param  string $tag
     * @return bool
     * @access public
     */
    public function hasTag(/*# string */ $tag)/*# : bool */;

    /**
     * Set/replace all tags
     *
     * @param  array $tags
     * @return this
     * @access public
     */
    public function setTags(array $tags);

    /**
     * Get all tags
     *
     * @return array
     * @access public
     */
    public function getTags()/*# : array */;

    /**
     * Return array containing tags exist in both $this->tags and $tags
     *
     * @param  array $tags tags to match against
     * @return array
     * @access public
     */
    public function hasTags(array $tags)/*# : array */;

    /**
     * Remove a tag
     *
     * @param  string $tag
     * @return this
     * @access public
     */
    public function removeTag(/*# string */ $tag);
}
