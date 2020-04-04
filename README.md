# PHPUnit Tests

## Installing Dependencies

Install all the dependencies using `composer install`

## Running Test

Run the tests written in tests directory using `vendor\bin\phpunit tests`

Run the tests in a single module using `vendor\bin\phpunit tests\moduleName`

Run the tests using filter param `vendor\bin\phpunit tests --filter=testTax`

Run the tests using filter param `vendor\bin\phpunit tests --filter=ReceiptTest::testTax`

Run a test using testsuite defined in **phpunit.xml** param `vendor\bin\phpunit tests --testsuite=app --filter=testTax`

Note that the directory separator may vary in different operating systems.
