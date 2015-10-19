<?php

namespace Phossa\Shared\Exception;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-10-14 at 07:22:13.
 */
class InvalidArgumentExceptionTest
    extends \PHPUnit_Framework_TestCase
{

    /**
     * @var InvalidArgumentException
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new InvalidArgumentException;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     * test instanceof \LogicException
     */
    public function test1()
    {
        $this->assertTrue($this->object instanceof \LogicException);
    }

    /**
     * test instanceof Phossa\Shared\Exception\ExceptionInterface
     */
    public function test2()
    {
        $this->assertTrue($this->object instanceof ExceptionInterface);
    }

    /**
     * test instanceof \InvalidArgumentException
     */
    public function test3()
    {
        $this->assertTrue($this->object instanceof \InvalidArgumentException);
    }

}
