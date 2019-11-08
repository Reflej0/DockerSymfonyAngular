<?php
namespace App\EventListener;

use App\Entity\Product;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class ProductChangedListerner
{
    // the entity listener methods receive two arguments:
    // the entity instance and the lifecycle event
    public function postUpdate(Product $product, PreUpdateEventArgs $event)
    {
        // ... do something to notify the changes
    }
}