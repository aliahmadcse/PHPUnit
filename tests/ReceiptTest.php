<?php

namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt;

class ReceiptTest extends TestCase
{
    /**
     * to instantiate the class whose methods are going to be tested
     */
    public function setUp()
    {
        $this->Receipt = new Receipt();
    }

    /**
     * to unset the object of the tested class
     */
    public function tearDonw()
    {
        unset($this->Receipt);
    }

    public function testTotal()
    {
        $input = [0, 2, 5, 8];
        $coupon = null;
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(
            15,
            $output,
            'When summing the total should equal 15'
        );
    }

    public function testPostTaxTotal()
    {
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            ->setMethods(['total', 'tax'])
            ->getMock();
        $Receipt->method('total')
            ->will($this->returnValue(10.00));
        $Receipt->method('tax')
            ->will($this->returnValue(1.00));
        $result = $Receipt->postTaxTotal([1, 2, 5, 8], 0.20, null);
        $this->assertEquals(11.00, $result);
    }

    public function testTotalAndCoupon()
    {
        $input = [0, 2, 5, 8];
        $coupon = 0.20;
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(
            12,
            $output,
            'When summing the total should equal 12'
        );
    }

    public function testTax()
    {
        $inputAmount = 10.00;
        $taxInput = 0.10;
        $output = $this->Receipt->tax($inputAmount, $taxInput);
        $this->assertEquals(
            1.00,
            $output,
            'The tax calculation must be equal 1.00'
        );
    }
}
