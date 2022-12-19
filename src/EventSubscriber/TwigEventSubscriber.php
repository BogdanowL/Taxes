<?php

namespace App\EventSubscriber;

use App\Repository\ProductRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{

    public function __construct(private Environment $twig, private ProductRepository $productRepository)
    {
    }


    public function onControllerEvent(ControllerEvent $event): void
    {
        $this->twig->addGlobal('products', $this->productRepository->findAll());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ControllerEvent::class => 'onControllerEvent',
        ];
    }
}
