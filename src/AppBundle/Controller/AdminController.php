<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 06/12/2017
 * Time: 08:59
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Site;
use AppBundle\Security\Core\User\OAuthUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class AdminController
 *
 * @author François MATHIEU <francois.mathieu@livexp.fr>
 * @method OAuthUser getUser()
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_index")
     * @return Response
     */
    public function indexAction()
    {
        $site = $this->get('AppBundle\Manager\SiteManager')->getSite();

        return $this->render('AppBundle:Admin:index.html.twig', [
            'site' => $site
        ]);
    }

    /**
     * @Route("/albums", name="admin_albums")
     * @return Response
     */
    public function albumsAction()
    {
        $site = $this->get('AppBundle\Manager\SiteManager')->getSite();

        return $this->render('AppBundle:Admin:albums.html.twig', [
            'site' => $site
        ]);
    }

    /**
     * @Route("/album{}", name="admin_album")
     * @return Response
     */
    public function albumAction($album = null)
    {

        $album_name = ucwords(str_replace("-", " ", $album));

        $site = $this->get('AppBundle\Manager\SiteManager')->getSite();

        return $this->render('AppBundle:Admin:album.html.twig', [
            'site' => $site,
            'album' => $album_name
        ]);
    }

}