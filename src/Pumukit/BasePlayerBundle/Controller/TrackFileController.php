<?php

namespace Pumukit\BasePlayerBundle\Controller;

use Pumukit\SchemaBundle\Document\Broadcast;
use Pumukit\SchemaBundle\Document\MultimediaObject;
use Pumukit\SchemaBundle\Document\Track;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Pumukit\BasePlayerBundle\Event\BasePlayerEvents;
use Pumukit\BasePlayerBundle\Event\ViewedEvent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TrackFileController extends Controller
{
    /**
     * @Route("/trackfile/{id}.{ext}", name="pumukit_trackfile_index" )
     */
    public function indexAction($id, Request $request)
    {
        $mmobjRepo = $this
          ->get('doctrine_mongodb.odm.document_manager')
          ->getRepository('PumukitSchemaBundle:MultimediaObject');

        $mmobj = $mmobjRepo->findOneByTrackId($id);
        if(!$mmobj) {
            throw $this->createNotFoundException("Not mmobj found with the track id: $id");
        }
        $track = $mmobj->getTrackById($id);

        return $this->redirect($track->getUrl());
    }
}
