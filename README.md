# Pasifik Panel API PHP

This library package provides a variety systems, the simplest way to integrate Pasifik services with your system.

## Requirements
`PHP>=5` version.

## Installation
Download source code.

Unzip package and enter to `main/` directory.

Copy `pasifik.php` file to your directory.

## Usage

```php
    <?php
      require_once("pasifik.php");
      $username = "YOUR_USERNAME";
      $password = "YOUR_PASSWORD";
      $header = "YOUR_COMPANY"; // Message Header (3 min, 11 max).
      $lang = "en"; // 'tr': Turkish response, 'en': English response, 'ar': Arabic response.
      $DEBUG = true;
      $obj = new PasifikAPI($username, $password, $lang, $DEBUG);
    ?>
```
## Test Case

Follow `test.php` TestCase class, for test just uncomment the following methods and replace it with requirement parameters.

```php
    <?php 
      $test = new TestCase();
      //$test->send_one_message_to_many_receipients();
      //$test->send_one_message_to_many_receipients_schedule_delivery();
      //$test->send_one_message_to_many_receipients_schedule_delivery_with_validity_period();
      //$test->send_one_message_to_many_receipients_turkish_language();
      //$test->send_one_message_to_many_receipients_flash_sms();
      //$test->send_one_message_to_many_receipients_unicode();
      //$test->send_one_message_to_many_receipients_outside_turkey();
      //$test->send_many_message_to_many_receipients();
      //$test->query_multi_general_report();
      //$test->query_multi_general_report_with_id();
      //$test->query_detailed_report_with_id();
      //$test->get_account_settings();
      //$test->get_authority();
      //$test->get_cdr_report();
      //$test->get_cdr_report_range_datetime();
      //$test->get_cdr_report_with_type();
      //$test->get_active_calls();
      //$test->get_disconnect_active_call();
    ?>
```
For Linux inside terminal install php5-cli 

* Ubuntu (debian): `sudo apt-get php5-cli`
* CentOS: `yum install php5-cli`

Go to downloaded file directory and run php code on local server:

    cd /path/to/code/Pasifik-Panel-API-PHP-master/main/
    php -S 127.0.0.1:8888

then open your browser on [http://127.0.0.1:8888](http://127.0.0.1:8888)
