<?php

declare(strict_types=1);

namespace App\Application\Actions\Wemanity;

use App\Application\Actions\Action;
use App\Domain\Wemanity\WemanityRepository;
use Psr\Log\LoggerInterface;

abstract class WemanityAction extends Action
{
    protected WemanityRepository $wemanityRepository;
    protected $remplacements;
    protected $result = [];

    /**
     * @param LoggerInterface $logger
    * @param WemanityRepository $wemanityRepository
    */
    public function __construct(LoggerInterface $logger, WemanityRepository $wemanityRepository)
    {
        parent::__construct($logger);
        $this->wemanityRepository = $wemanityRepository;
        $this->remplacements = ['0' => '*', '3' => 'Foo', '5' => 'Bar', '7' => 'Qix'];
    }
}
