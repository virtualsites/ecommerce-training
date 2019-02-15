<?php
namespace spec\Domain;

use PhpSpec\ObjectBehavior;

class ItemSpec extends ObjectBehavior
{
    public function it_is_return_price()
    {
        $this->beConstructedWith('Item', 15.60);
        $this->getPrice()->shouldReturn(15.60);
    }

    public function it_is_return_price_as_double_type()
    {
        $this->beConstructedWith('Item', 4);
        $this->getPrice()->shouldBeDouble();
    }
}
