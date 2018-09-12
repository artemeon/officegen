
# Officegen

Bridge component which provides a way to generate a report through an external library. I.e.
we can use the apache POI library to generate specific reports. The main class of the component
is the `Processor` class which you can easily register in your DI container.

```php
$reportFile = "my_report.docx";

$generator = new BlackHole();
$processor = new Processor($generator);
$processor->execute("TestReport", $reportFile, ["foo" => "bar"]);
```
