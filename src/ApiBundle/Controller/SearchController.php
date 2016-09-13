<?php

namespace ApiBundle\Controller;

use ApiBundle\Form\Type\QueryType;
use ApiBundle\Model\Query;
use SearchBundle\Entity\Site;
use SearchBundle\Model\Result;
use SearchBundle\Model\ResultCollection;
use SearchBundle\Repository\SiteRepository;
use SearchBundle\Search\SearchStrategy;
use SearchBundle\Search\StrategyFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends BaseController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(QueryType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && !$form->isValid()) {
            return $this->error($this->getFormErrorsAsArray($form));
        }

        /** @var Query $query */
        $query = $form->getData();
        $stringQuery = str_replace('+', ' ', $query->text);

        /** @var StrategyFactory $strategyFactory */
        $strategyFactory = $result = $this->get('search.strategy_factory');
        /** @var SearchStrategy $strategy */
        $strategy = $strategyFactory->getStrategy('google');
        /** @var ResultCollection $result */
        $results = $strategy->get($stringQuery);

        /** @var Result $result */
        foreach ($results->getResults() as $result) {
            /** @var SiteRepository $siteRepository */
            $siteRepository = $this->getRepository(Site::class);
            /** @var Site $site */
            $site = $siteRepository->findByUrl($result->getUrl());

            if ($site) {
                $result->setRate($result->getRate() + $site->getRate());
            }
        }

        $results->sortByRate();

        return $this->success($results->getResults(), 'Result', Response::HTTP_OK, array('RESULT_DETAILS'));
    }
}
