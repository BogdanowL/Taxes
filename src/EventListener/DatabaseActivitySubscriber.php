<?php


namespace App\EventListener;

use App\Entity\Product;
use App\Service\Interface\IComputePrice;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class DatabaseActivitySubscriber implements EventSubscriberInterface
{

    public function __construct(private IComputePrice $computePrice)
    {
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
        ];
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $this->computePrice($args);
    }

    private function computePrice(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof Product) {
            $price = $this->computePrice->compute($entity);

            $entity->setPrice($price);
        }

    }
}