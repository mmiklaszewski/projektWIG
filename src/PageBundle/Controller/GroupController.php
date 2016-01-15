<?php

namespace PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use PageBundle\Entity\Groups;
use PageBundle\Form\Type;

class GroupController extends Controller
{
    /**
     * @Route("/show-group", name="show_group_route")
     *
     * @Template("PageBundle:Page/Group:showGroup.html.twig")
     */
    public function showGroupAction(){
        $repo = $this->getDoctrine()->getRepository('PageBundle:Groups');
        $groups = $repo->findBy(array(
            'group_archive' => '0',
        ));

        $repoContacts = $this->getDoctrine()->getRepository('PageBundle:Contact');
        $contacts = $repoContacts->findAll();

        return array(
            'groups' => $groups,
            'contacts' => $contacts,
        );
    }

    /**
     * @Route("/add-group", name="add_group_route")
     *
     * @Template("PageBundle:Page/Group:addGroup.html.twig")
     */
    public function addGroupAction(Request $request){

        $group = new Groups();
        $user = $this->getUser();

        $form = $this->createForm(new Type\GroupsType(), $group);

        $form->handleRequest($request);

        if ($request->isMethod('POST')) {

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $group->setUserId($user);
                $group->setGroupArchive('0');
                $em->persist($group);
                $em->flush();
                return $this->redirect($this->generateUrl('add_group_route'));

            }
        }
        return array(
            'form' => isset($form) ? $form->createView() : NULL,
        );



    }

    /**
     * @Route("/edit-group", name="edit_group_route")
     */
    public function editGroupAction(Request $request){
        $id = $request->get('group_id');
        $name = $request->get('group_name');


        $repo = $this->getDoctrine()->getRepository('PageBundle:Groups');
        $group = $repo ->findOneBy(array(
            'group_id' => $id,
        ));
        $group->setGroupName($name);

        $em = $this->getDoctrine()->getManager();
        $em->persist($group);
        $em->flush();

        $response = new Response();
        $output = array('success' => true, 'name' => $group->getGroupName());
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('X-Requested-With', 'XMLHttpRequest');
        $response->setContent(json_encode($output));

        return $response;


    }

    /**
     * @Route("/remove-group/{id}", name="remove_group_route")
     */
    public function removeGroupAction($id){

        $repo = $this->getDoctrine()->getRepository('PageBundle:Groups');
        $group = $repo->findOneBy(array(
            'group_id' => $id,
        ));

        $user = $this->getUser();
        $userId = $group->getUserId();

        if ($user == $userId) {

            $repoContacts = $this->getDoctrine()->getRepository('PageBundle:Contact');
            $contacts = $repoContacts->findBy(array(
                'group_id' => $id,
            ));
            $em = $this->getDoctrine()->getManager();
            foreach ($contacts as $contact) {
                $contact->setContactArchive('1');
                $em->persist($contact);
                $em->flush();
            };

            $group->setGroupArchive('1');
            $em->persist($group);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('show_group_route'));
    }


}