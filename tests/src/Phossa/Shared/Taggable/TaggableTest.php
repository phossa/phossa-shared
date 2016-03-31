<?php

namespace Phossa\Shared\Taggable;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-10-14 at 08:38:18.
 */
class TaggableTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TaggableInterface
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        include_once __DIR__ . '/Taggable.php';
        $this->object = new Taggable();

        set_error_handler(function($errno, $errstr, $errfile, $errline) {
            throw new \RuntimeException($errstr . " on line " . $errline . " in file " . $errfile);
        });
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        restore_error_handler();
    }

    /**
     * Call protected/private method of a class.
     *
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    protected function invokeMethod($methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass($this->object);
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($this->object, $parameters);
    }

    /**
     * getPrivateProperty
     *
     * @param 	string $propertyName
     * @return	the property
     */
    public function getPrivateProperty($propertyName) {
        $reflector = new \ReflectionClass($this->object);
        $property  = $reflector->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($this->object);
    }

    /**
     * @covers Phossa\Shared\Taggable\TaggableTrait::addTag
     */
    public function testAddTag1()
    {
        $this->object->addTag('test');
        $this->assertEquals(['test'], $this->getPrivateProperty('tags'));
    }

    /**
     * Test add non string tag
     *
     * @covers Phossa\Shared\Taggable\TaggableTrait::addTag
     * @expectedException \RuntimeException
     * @expectedExceptionMessage string
     */
    public function testAddTag2()
    {
        $this->object->addTag(['test']);
    }

    /**
     * @covers Phossa\Shared\Taggable\TaggableTrait::hasTag
     */
    public function testHasTag1()
    {
        $this->assertFalse($this->object->hasTag('test'));
        $this->object->addTag('test');
        $this->assertTrue($this->object->hasTag('test'));
    }

    /**
     * @covers Phossa\Shared\Taggable\TaggableTrait::setTags
     * @covers Phossa\Shared\Taggable\TaggableTrait::getTags
     */
    public function testSetTags()
    {
        $tags = ['test1', 'test2'];
        $this->assertFalse($this->object->hasTag('test2'));
        $this->object->setTags($tags);
        $this->assertEquals($tags, $this->object->getTags());
        $this->assertTrue($this->object->hasTag('test2'));
    }

    /**
     * @covers Phossa\Shared\Taggable\TaggableTrait::hasTags
     */
    public function testHasTags()
    {
        $tags = ['test1', 'test2'];
        $this->object->setTags($tags);
        $this->assertEquals(
            ['test1'],
            $this->object->hasTags(['a', 'b', 'test1'])
        );
    }

    /**
     * @covers Phossa\Shared\Taggable\TaggableTrait::removeTag
     */
    public function testRemoveTag()
    {
        $tags = ['test1', 'test2'];
        $this->object->setTags($tags);
        $this->object->removeTag('test2');
        $this->assertTrue($this->object->hasTag('test1'));
        $this->assertFalse($this->object->hasTag('test2'));
    }
}
