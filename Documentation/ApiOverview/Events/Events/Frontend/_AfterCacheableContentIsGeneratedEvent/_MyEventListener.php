<?php

declare(strict_types=1);

namespace MyVendor\MyExtension\Frontend\EventListener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Frontend\Event\AfterCacheableContentIsGeneratedEvent;

#[AsEventListener(
    identifier: 'my-extension/content-modifier'
)]
final class MyEventListener
{
    public function __invoke(AfterCacheableContentIsGeneratedEvent $event): void
    {
        // Only do this when caching is enabled
        if (!$event->isCachingEnabled()) {
            return;
        }
        $event->getController()->content = str_replace(
            'foo',
            'bar',
            $event->getController()->content
        );
    }
}
