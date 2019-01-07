<?php
namespace App\Utils;

use Doctrine\Common\Persistence\ManagerRegistry;

class AbstractManagerRegistry
{
    public $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
}