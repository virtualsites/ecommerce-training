<?php
declare(strict_types=1);

namespace Domain;

use Domain\Model\CartInterface;
use PHPUnit\Framework\TestCase;

class OperatorTest extends TestCase
{
    /** @var CartInterface */
    private $cart;

    public function setUp(): void
    {
        $this->cart = Cart::empty();
    }

    public function testToArray(): void
    {
        $operator = new Operator($this->cart, false, 0);
        self::assertArrayHasKey('oldTotal', $operator->toArray());
        self::assertArrayHasKey('newTotal', $operator->toArray());
    }

    public function testNewTotalIsChangeWhenIsCustomer(): void
    {
        $this->cart->addItem(new Item('foo', 120));
        $operator = new Operator($this->cart, true, 50);
        $toArray = $operator->toArray();
        self::assertSame(120.00, $toArray['oldTotal']);
        self::assertSame(60.00, $toArray['newTotal']);
    }
}
