# API Wrapper for [GlassDoor](http://www.glassdoor.com/api/index.htm)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require betterweekdays/glassdoor "*"
```

or add

```
"betterweekdays/glassdoor": "*"
```

to the require section of your `composer.json` file.

## Example

* To connect to the glassdoor API first create a config object.

```
$config = new \Glassdoor\Config('partner id', 'partner key', 'http://api.glassdoor.com/api/api.htm', 'json');
```

Then Create the Connection Object.

```
$conn = new \Glassdoor\Connection($config);
```

Next create an Action and add parameters.

```
$action = new \Glassdoor\Action\JobProgression();
$action->addparam('job_title', 'cashier');
```

Finally make the call

```
$response = $conn->call($action);
```

The response will be an instance of \Glassdoor\ResponseObject\ResponseInterface
which is specified by the Action.

## Custom PSR7 Middleware

If you wish to add a custom PS7 Middleware then you can add a custom HandlerStack.  See http://docs.guzzlephp.org/en/latest/handlers-and-middleware.html for more details

```
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;

$handler = new CurlHandler();
$stack = HandlerStack::create($handler); // Wrap w/ middleware

$connection->setHandlerStack($stack)
```

## Actions

Implemented Endpoinsts:
 - [JobProgression](http://www.glassdoor.com/api/jobsApiActions.htm#JobProgression)
 - [Company Search](http://www.glassdoor.com/api/companiesApiActions.htm#CompanySearch)
