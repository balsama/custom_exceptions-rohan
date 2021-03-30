<?php
namespace Drupal\custom_exceptions\EventSubscriber;
use Drupal\Core\Config\ConfigCrudEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
/**
 */
class CustomHandler implements EventSubscriberInterface {
  /**
   * rebuilds the router when node.settings:use_admin_theme is changed
   * @param \Drupal\Core\Config\ConfigCrudEvent $event
   */
  public function onException(ExceptionEvent $event) {
		$exception = $event->getThrowable();
		if ($exception->getStatusCode() == 404) {
			\Drupal::messenger()->addWarning('THE PAGE IS MISSING!');
		}
		if ($exception->getStatusCode() == '403') {
			\Drupal::messenger()->addWarning('DO NOT ENTER!');
		}
	}
  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::EXCEPTION][] = ['onException'];
    return $events;
  }
}
