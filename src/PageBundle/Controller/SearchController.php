<?php
namespace PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use PageBundle\Entity\Contact;

class SearchController extends Controller
{
    /**
     * @Route("/search-contact", name="search_contact_route")
     *
     *
     * @Template("PageBundle:Page/Contact:searchContact.html.twig")
     *
     */
    public function searchContactAction(Request $request){

        $fraza = $request->get('fraza');
        $frazaArray =  explode(' ', $fraza);

        $i = 0;


        $name = '';
        $surname = '';
        $group = '';
        $province = '';
        $city = '';
        $street = '';
        $home_number = '';
        $postal_code = '';
        $email = '';
        $phone = '';
        if ($fraza != null) {

            if ($request->get('name') != null){
                $name = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('surname') != null) {
                $surname = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('group') != null) {
                $groupName = $frazaArray[$i];
                $repoGroup = $this->getDoctrine()->getRepository('PageBundle:Groups');
                $groupId = $repoGroup->findOneBy(array(
                    'group_name' => $groupName,
                ));
                if ($groupId != null){
                    $group = $groupId->getGroupId();
                } else {
                    $group = '0';
                }

                ++$i;
            }
            if ($request->get('province') != null) {
                $province = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('city') != null) {
                $city = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('street') != null) {
                $street = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('home_number') != null) {
                $home_number = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('postal_code') != null) {
                $postal_code = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('email') != null) {
                $email = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('phone') != null) {
                $phone = $frazaArray[$i];
                ++$i;
            }

        }



        $em = $this->getDoctrine()->getManager();
        $contacts = $em->getRepository('PageBundle:Contact')->getContactBy($name, $surname, $group, $province, $city, $street, $home_number, $postal_code, $email, $phone);

        return array(
            'contacts' => $contacts,

//            'name' => $name,

        );
//
//        $response = new Response();
//
//        $output = array('success' => true, 'name' => $contacts);
//        $response->headers->set('Content-Type', 'application/json');
//        $response->headers->set('X-Requested-With', 'XMLHttpRequest');
//        $response->setContent(json_encode($contacts));
//
//        return $response;

    }

}