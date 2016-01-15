<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class ReminderController extends Controller
{
    /**
     * @Route("/login_check/reminder", name="reminder_route")
     *
     * @Template("PageBundle:Security/Reminder:reminder.html.twig")
     */
    public function reminderAction(){
        return array(
            'info' => 'Podaj swoj login aby odzyskac haslo',
        );
    }

    /**
     * @Route("/login_check/reminder-question", name="question_reminder_route")
     */
    public function getQuestionAction(Request $request){
        $username = $request->get('username');

        $repo = $this->getDoctrine()->getRepository('UserBundle:User');
        $user = $repo->findOneBy(array(
            'username' => $username,
        ));
        $result = 'false';
        if ($user != null) {
            $result = $user->getQuestion();
        }

        return new Response($result);
    }

    /**
     * @Route("/login_check/reminder_check", name="answer_reminder_route")
     */
    public function checkAnswerAction(Request $request){

        $username = $request->get('usernamepost');
        $answer = $request->get('answer');

        $repo = $this->getDoctrine()->getRepository('UserBundle:User');
        $user = $repo->findOneBy(array(
            'username' => $username,
        ));

        $result = 'false';
        if ($user != null) {
            $userAnswer = $user->getAnswer();
            if ($userAnswer == $answer) {

                $mc_key = '1616161616161616';

                $pass = $user->getPass();
                $decoded = base64_decode($pass);
                $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
                $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($decoded), MCRYPT_MODE_ECB, $iv));

                $result = $decrypted;

            } else {
                $result = 'false';
            }
        }
        return new Response($result);

    }

}