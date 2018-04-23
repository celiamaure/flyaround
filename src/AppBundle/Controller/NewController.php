<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NewController extends Controller
{
    /**
     * @Route("/new", name="newpage")
     */
    public function newAction(Request $request)
    {
        return $this->render('new/new.html.twig');
    }

}

