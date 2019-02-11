<?php
namespace spec\Domain;

use Domain\Cart;
use Domain\Item\ItemsCollection;
use Domain\Model\CartInterface;
use Domain\Model\ItemInterface;
use PhpSpec\ObjectBehavior;
use PhpSpec\Wrapper\Collaborator;

class CartSpec extends ObjectBehavior
{
    function let()
    {
        // arrange
        $this->beConstructedWith(new ItemsCollection([]));
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Cart::class);
        $this->shouldImplement(CartInterface::class);
    }

    function it_is_created_with_demo_items()
    {
        $this->beConstructedThrough('withDemonstratedItems');
        $this->getTotal()->shouldReturn(300.00);
    }

    /**
     * @param ItemInterface|Collaborator $item
     */
    public function it_can_add_items(ItemInterface $item)
    {
        // arrange
        $item->getPrice()->willReturn(100.00);
        // act
        $this->addItem($item);
        // assert
        $this->getTotal()->shouldReturn(100.00);
    }

    /**
     * @param ItemInterface|Collaborator $item
     * @param ItemInterface|Collaborator $item2
     */
    public function it_can_get_correct_total_price(ItemInterface $item, ItemInterface $item2)
    {
        // arrange
        $item->getPrice()->willReturn(100.00);
        $item2->getPrice()->willReturn(200.00);
        // act
        $this->addItem($item);
        $this->addItem($item2);
        // assert
        $this->getTotal()->shouldReturn(300.00);
    }

    /**
     * @param ItemInterface|Collaborator $item
     */
    public function it_can_change_total_price(ItemInterface $item)
    {
        // arrange
        $item->getPrice()->willReturn(100.00);
        // act
        $this->addItem($item);
        $this->changeTotal(200);
        // assert
        $this->getTotal()->shouldReturn(200.00);
    }
}
