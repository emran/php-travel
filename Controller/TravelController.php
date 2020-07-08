<?php
namespace TravelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class TravelController extends Controller
{

    /**
     * @Route("/travel/latest/{limit}", name="travelbundle_mostrecent")
     * @Template("TravelBundle:Travel/TravelOverviewPage:home-teaser.html.twig")
     *
     * @param     $request
     * @param int $limit
     *
     * @return array
     */
    public function getMostRecentAction(Request $request, $limit)
    {
        $_locale = $request->get('_locale');
        $limit = (int) $limit;
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('TravelBundle:Travel\TravelPage');
        $pages = $repository->getArticles($_locale, 0, $limit);

        return array('travelpages' => $pages);
    }

    /**
     * Find the comments of the TravelComment and render the comments template of the TravelPage
     *
     * @Route("/travel/comments/{travelPage}", name="travelbundle_comments")
     * @Template("TravelBundle:Travel/TravelPage:comments.html.twig")
     * @param $travelPage int
     *
     * @return array
     */
    public function getCommentsAction($travelPage)
    {
        $em = $this->getDoctrine()->getManager();
        $travelCommentRepository = $em->getRepository('TravelBundle:Travel\TravelComment');
        $comments = $travelCommentRepository->findByTravelPage($travelPage);

        return array('comments' => $comments);
    }

}
