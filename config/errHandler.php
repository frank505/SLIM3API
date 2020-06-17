<?php
$container["errorHandler"] = function ($container)
{
    return function ($request,$response,$exception) use ($container)
    {
        return $response->withStatus(500)
            ->withHeader('Content-Type','application/json')
            ->write(json_encode(
                array(
                    "success"=>false,
                    "error"=>"INTERNAL_ERROR",
                    "message"=>"something went wrong internally",
                    "status_code"=>"500",
                    'trace'=>$exception->getTraceAsString()
                ),
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            ));
    };
};


$container["notFoundHandler"] = function ($container)
{
    return function ($request,$response,$exception) use ($container)
    {
        return $response->withStatus(404)
            ->withHeader('Content-Type','application/json')
            ->write(json_encode(
                array(
                    "success"=>false,
                    "error"=>"NOT_FOUND",
                    "message"=>"EndPoint was not found",
                    "status_code"=>"404",
                ),
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            ));
    };
};



$container["notAllowedHandler"] = function ($container)
{
    return function ($request,$response,$exception) use ($container)
    {
        return $response->withStatus(405)
            ->withHeader('Content-Type','application/json')
            ->write(json_encode(
                array(
                    "success"=>false,
                    "error"=>"NOT_ALLOWED",
                    "message"=>"this request is not allowed on this route",
                    "status_code"=>"405",
                ),
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            ));
    };
};




$container['phpErrorHandler'] = function($container)
{
  return $container["errorHandler"];
};