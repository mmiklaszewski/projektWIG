<?php

namespace PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use PageBundle\Entity\Contact;
use PageBundle\Entity\Groups;

use PageBundle\Form\Type;

class ContactController extends  Controller
{

    /**
     * @Route("/add-contact", name="add_contact_route")
     *
     * @Template("PageBundle:Page/Contact:addContact.html.twig")
     */
    public function addContactAction(Request $request){

        $contact = new Contact();
        $user = $this->getUser();

        $form = $this->createForm(new Type\ContactType(), $contact);

        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            if ($form->isValid()) {
                $contact->setContactArchive('0');
                $em = $this->getDoctrine()->getManager();
                $contact->setUserId($user);
                $em->persist($contact);
                $em->flush();
            }
        }
        return array(
            'form' => isset($form) ? $form->createView() : NULL,

        );
    }

    /**
     * @Route("/remove-contact/{id}", name="remove_contact_route")
     */
    public function removeContactAction($id){



        $repo = $this->getDoctrine()->getRepository('PageBundle:Contact');
        $contact = $repo->findOneBy(array(
            'contact_id' => $id,
        ));
        $user = $this->getUser();
        $userId = $contact->getUserId();

        if ($user == $userId) {
            $em = $this->getDoctrine()->getManager();
            $contact->setContactArchive('1');
            $em->persist($contact);
            $em->flush();
        }



//        return array(
//            'u' => $user,
//            'c' =>
//        )
        return $this->redirect($this->generateUrl('show_contact_route'));

    }


    /**
     * @Route("/show-contact", name="show_contact_route")
     *
     * @Template("PageBundle:Page/Contact:showContact.html.twig")
     */
    public function showContactAction(){

        $repo = $this->getDoctrine()->getRepository('PageBundle:Contact');
        $contacts = $repo->findBy(array(
            'contact_archive' => '0',
        ));

        $repoGroups = $this->getDoctrine()->getRepository('PageBundle:Groups');
        $groups = $repoGroups->findBy(array(
            'group_archive' => 0,
        ));


        return array(
            'contacts' => $contacts,
            'groups' => $groups,

        );

    }

    /**
     * @Route("/edit-contact", name="edit_contact_route")
     */
    public function editContactAction(Request $request){

        $id = $request->get('contact_id');
        $groupName = $request->get('group_id');
        $name = $request->get('contact_name');
        $surname = $request->get('contact_surname');
        $province = $request->get('contact_province');
        $city = $request->get('contact_city');
        $street = $request->get('contact_street');
        $home_number = $request->get('contact_home_number');
        $postal_code = $request->get('contact_postal_code');
        $phone = $request->get('contact_phone');
        $email = $request->get('contact_email');


        $repo = $this->getDoctrine()->getRepository('PageBundle:Contact');
        $contact = $repo->findOneBy(array(
            'contact_id' => $id
        ));

        $repoGroup = $this->getDoctrine()->getRepository('PageBundle:Groups');
        $group = $repoGroup->findOneBy(array(
            'group_name' => $groupName,
        ));

        $contact->setContactName($name);
        $contact->setContactSurname($surname);
        $contact->setGroupId($group);
        $contact->setContactProvince($province);
        $contact->setContactCity($city);
        $contact->setContactStreet($street);
        $contact->setContactHomeNumber($home_number);
        $contact->setContactPostalCode($postal_code);
        $contact->setContactPhone($phone);
        $contact->setContactEmail($email);

        $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();

        $response = new Response();
        $output = array('success' => true, 'name' => $contact->getContactName());
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('X-Requested-With', 'XMLHttpRequest');
        $response->setContent(json_encode($output));

       return $response;

    }


    /**
     * @Route("/show-test", name="show_test_route")
     *
     * @Template("PageBundle:Page/Contact:test.html.twig")
     */
    public function testCreatorAction(){
        $hello = 'hello';

        return array(
            'welcome' => $hello,
        );

    }

    /**
     * @Route("/search", name="search_route")
     *
     *
     * @Template("PageBundle:Page/Contact:test.html.twig")
     *
     */
    public function showTestAction(Request $request){

        $fraza = $request->get('fraza');
        $frazaArray =  explode(' ', $fraza);

        $i = 0;

        $name = '';
        $surname = '';
        $city = '';
        if ($fraza != null) {

            if ($request->get('name') != null){
                $name = $frazaArray[$i];
                ++$i;
            }

            if ($request->get('surname') != null) {
                $surname = $frazaArray[$i];
                ++$i;
            }
            if ($request->get('city') != null) {
                $city = $frazaArray[$i];
                ++$i;
            }


        }



        $em = $this->getDoctrine()->getManager();
        $test = $em->getRepository('PageBundle:Test')->getTestByName($name, $surname, $city);

        return array(
           'test' => $test,

        );

//        $response = new Response();
//
////        $output = array('success' => true, 'name' => $test);
//      //  $response->headers->set('Content-Type', 'application/json');
////        $response->headers->set('X-Requested-With', 'XMLHttpRequest');
//        $response->setContent(json_encode($test));
//
//        return $response;

    }



}