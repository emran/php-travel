<?php

namespace TravelBundle\Repository\Travel;

use Doctrine\ORM\EntityRepository;

/**
 * TravelCommentRepository
 */
class TravelCommentRepository extends EntityRepository
{

    /**
     * Returns a list of TravelComments with the TravelPage
     * Ordered by ascending created datetime
     *
     * @param $id int
     *
     * @return array
     */
    public function findByTravelPage($id)
    {
        $travelPageRepository = $this->_em->getRepository('TravelBundle:Travel\TravelPage');
        $travelpage = $travelPageRepository->find($id);

        return $travelpage;
    }

}
