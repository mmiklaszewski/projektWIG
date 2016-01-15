<?php


namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use UserBundle\Entity\User;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ReturnController extends Controller
{

    /**
     * @Route("/check/username", name="check_username_route")
     */
    public function checkUsernameAction(Request $request){

        $username = $request->get('username');
        $repo = $this->getDoctrine()->getRepository('UserBundle:User');
        $user = $repo ->findBy(array(
            'username' => $username,
        ));
        $result = 'true';
        if ($user != null) {
            $result = 'false';
        }
        return new Response($result);

    }

    /**
     * @Route("/check/email", name="check_email_route")
     */
    public function checkEmailAction(Request $request){

        $email = $request->get('email');
        $repo = $this->getDoctrine()->getRepository('UserBundle:User');
        $user = $repo ->findBy(array(
            'email' => $email,
        ));
        $result = 'true';
        if ($user != null) {
            $result = 'false';
        }
        return new Response($result);

    }

    /**
     * @Route("/check/password", name="check_password_route")
     */
    public function checkPasswordAction(Request $request){
        $user = $this->getUser();
        $username = $user->getUsername();
        $password = $request->get('current_password');

        $repo = $this->getDoctrine()->getRepository('UserBundle:User');
        $user = $repo ->findOneBy(array(
            'username' => $username,
        ));

        $pass = $user->getPass();
        $mc_key = '1616161616161616';

        $decoded = base64_decode($pass);
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
        $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($decoded), MCRYPT_MODE_ECB, $iv));


        $result = 'false';
        if ($decrypted == $password) {
            $result = 'true';
        }
        return new Response($result);

    }

    /**
     * @Route("/check/pass", name="check_pass_route")
     */
    public function checkPassAction(Request $request){
        $username = $$request->get('username');
        $password = $request->get('current_password');

        $repo = $this->getDoctrine()->getRepository('UserBundle:User');
        $user = $repo ->findOneBy(array(
            'username' => $username,
        ));

        $pass = $user->getPass();
        $mc_key = '1616161616161616';

        $decoded = base64_decode($pass);
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
        $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($decoded), MCRYPT_MODE_ECB, $iv));


        $result = 'false';
        if ($decrypted == $password) {
            $result = 'true';
        }
        return new Response($result);

    }

    /**
     * @Route("/check", name="test_route")
     * @Template("PageBundle:Security/Reminder:test.html.twig")
     */
    public function testAction() {

        $test = 'witaj w testerze';
        return array(
            'test' => $test,
        );

    }

}