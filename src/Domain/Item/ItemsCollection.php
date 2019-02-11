<?php
declare(strict_types=1);

namespace Domain\Item;

use Doctrine\Common\Collections\ArrayCollection;
use Domain\Item;

class ItemsCollection extends ArrayCollection
{
    public function __construct(array $items = [])
    {
        parent::__construct(array_map(
            function ($item) {
                return new Item($item['name'], $item['price']);
            },
            $items
        ));
    }
}
