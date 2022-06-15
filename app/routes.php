<?php

declare(strict_types=1);

use App\Application\Actions\Wemanity\NumberFormatAction;
use Slim\App;

return function (App $app) {
    $app->get('/', NumberFormatAction::class);
};
