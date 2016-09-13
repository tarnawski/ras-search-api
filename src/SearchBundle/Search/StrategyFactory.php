<?php

namespace SearchBundle\Search;

use SearchBundle\Exception\SearchStrategyException;

class StrategyFactory
{
    const GOOGLE_STRATEGY = 'google';

    public $googleStrategy;

    public function __construct(
        SearchStrategy $googleStrategy
    ) {
        $this->googleStrategy = $googleStrategy;
    }

    public function getStrategy($strategy)
    {
        switch ($strategy) {
            case self::GOOGLE_STRATEGY:
                return $this->googleStrategy;
                break;
            default:
                throw new SearchStrategyException('Strategy "'.$strategy.'" not found!');
        }
    }
}
