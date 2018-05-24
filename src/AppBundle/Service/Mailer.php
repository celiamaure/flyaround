<?php
namespace AppBundle\Service;

use AppBundle\Entity\Reservation;
use AppBundle\Entity\User;

class Mailer
{
    protected $mailer;
    protected $templating;
    private $from = "celiamaure00@gmail.com";
    private $reply = "celiamaure00@gmail.com";
    private $name = "Equipe mafonciere";

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    protected function sendMail($to, $subject, $body)
    {
         $mail = \Swift_Message::newInstance();

         $mail
             ->setFrom($this->from)
             ->setTo($to)
             ->setSubject($subject)
             ->setBody($body)
             ->setReplyTo($this->reply)
             ->setContentType('text/html');

         $this->mailer->send($mail);
    }

    public function sendPilotMail(Reservation $reservation)
    {
        $subject = "Notification";
        $to = $reservation->getFlight()->getPilot()->getEmail();
        $body = $this->templating->render('mail/pilotMail.html.twig', array('reservation' => $reservation));
        $this->sendMail($to, $subject, $body);
    }

    public function sendCustomerMail(Reservation $reservation)
    {
        $subject = 'validation';
        $to = $reservation->getPassenger()->getEmail();
        $body = $this->templating->render('mail\customerMail.html.twig', array('reservation' => $reservation));
        $this->sendMail($to, $subject, $body);
    }

}