<?php

namespace Drupal\Tests\custom_exceptions\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 */
class CustomExceptionsHandlerTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'custom_exceptions',
  ];

  public function testMessages() {
    $assert_session = $this->assertSession();

    $this->drupalGet('admin');
    $assert_session->pageTextContains('THE PAGE IS MISSING!');

    $this->drupalGet('missing');
    $assert_session->pageTextContains('DO NOT ENTER!');
  }

}
