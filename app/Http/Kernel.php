protected $routeMiddleware = [
    // Other middleware entries...

    'ownerMiddleware' => \App\Http\Middleware\OwnerMiddleware::class,
];