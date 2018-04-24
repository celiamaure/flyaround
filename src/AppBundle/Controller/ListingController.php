<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use AppBundle\Entity\Flight;
use AppBundle\Entity\PlaneModel;
use AppBundle\Entity\Reservation;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Listing controller
 *
 * @route("listing")
 */
class ListingController extends Controller
{
    /**
     * @Route("/{reservation_id}/flight/{flight_id}/planemodel/{planemodel_id}", name="listing_index", requirements={"reservation_id":"\d+"})
     * @Method("GET")
     * @ParamConverter("reservation", options={"mapping": {"reservation_id": "id"}})
     * @ParamConverter("flight", options={"mapping": {"reservation_id": "id"}})
     * @ParamConverter("planemodel", options={"mapping": {"planemodel_id": "id"}}))
     */
    public function indexAction(Reservation $reservation, Flight $flight, PlaneModel $planeModel)
    {
        return $this->render('listing/index.html.twig', array(
            'reservation'=>$reservation,
            'flight'=>$flight,
            'planemodel'=>$planeModel
        ));
    }
}