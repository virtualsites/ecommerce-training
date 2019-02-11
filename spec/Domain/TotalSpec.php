<?php
namespace spec\Domain;

use Domain\Model\TotalInterface;
use Domain\Total;
use PhpSpec\ObjectBehavior;

class TotalSpec extends ObjectBehavior
{
    function let()
    {
        // arrange
        $this->beConstructedWith(00.00);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Total::class);
        $this->shouldBeAnInstanceOf(TotalInterface::class);
    }

    function it_can_add_more_total_price()
    {
        // act
        $this->add(12.50);
        //assert
        $this->toFloat()->shouldReturn(12.50);
    }
}
