<?php

namespace Drupal\Tests\custom_exceptions\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests the functionality of Custom Exceptions Handler.
 *
 * @group custom_exceptions
 */
class CustomExceptionsHandlerTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'custom_exceptions',
  ];

  /**
   * The default theme for the test.
   *
   * @var string
   */
  protected $defaultTheme = 'stark';

  /**
   * Tests warning messages on pages.
   */
  public function testMessages() {
    $assert_session = $this->assertSession();
    $this->drupalGet('admin');
    $assert_session->statusMessageContains('DO NOT ENTER!', 'warning');

    $this->drupalGet('missing');
    $assert_session->statusMessageContains('THE PAGE IS MISSING!', 'warning');
  }

}
