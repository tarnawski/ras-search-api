<?php
namespace ApiBundle\Controller;

use SearchBundle\Entity\Site;
use SearchBundle\Model\Result;
use SearchBundle\Model\ResultCollection;
use SearchBundle\Repository\SiteRepository;
use SearchBundle\Search\SearchStrategy;
use SearchBundle\Search\StrategyFactory;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends BaseController
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        /** @var StrategyFactory $strategyFactory */
        $strategyFactory = $result = $this->get('search.strategy_factory');
        /** @var SearchStrategy $strategy */
        $strategy = $strategyFactory->getStrategy('google');
        /** @var ResultCollection $result */
        $results = $strategy->get('poczta');
        /** @var Result $result */
        $result = $results->getResults()[0];
        /** @var SiteRepository $siteRepository */
        $siteRepository = $this->getRepository(Site::class);
        $sites = $siteRepository->findByUrl($result->getUrl());


        return $this->success($sites, 'Site', Response::HTTP_OK, array('SITE_DETAILS'));
    }
}