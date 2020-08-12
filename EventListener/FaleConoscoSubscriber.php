<?php

namespace MauticPlugin\Mautic4LinuxMailBundle\EventListener;

use Mautic\CoreBundle\EventListener\CommonSubscriber;
use Mautic\EmailBundle\EmailEvents;
use Mautic\EmailBundle\Event\EmailSendEvent;

/**
 * Class AceiteDeContratoSubscriber
 *
 * @package MauticPlugin\Mautic4LinuxLGPDBundle\EventListener
 */
class FaleConoscoSubscriber extends CommonSubscriber
{
    const EMAIL_NAMES = [
        'Fale Conosco - E-Mail Interno',
    ];

    static public function getSubscribedEvents()
    {
        return [
            EmailEvents::EMAIL_ON_DISPLAY => [ 'onDisplay', 0 ],
        ];
    }

    public function onDisplay( EmailSendEvent $emailSendEvent )
    {
        $lead = $emailSendEvent->getLead();

        if ( !in_array( $emailSendEvent->getEmail()->getName(), self::EMAIL_NAMES ) ) {
            return;
        }

        if ( isset( $lead[ 'email' ] ) && filter_var( $lead[ 'email' ], FILTER_VALIDATE_EMAIL ) ) {

            $leadEmail = strval( $emailSendEvent->getLead()[ 'email' ] );
            $emailSendEvent->getEmail()->setFromAddress( $leadEmail );

        }
    }
}
