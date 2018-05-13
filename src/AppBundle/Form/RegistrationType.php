<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName')->add('lastName')->add('phoneNumber')->add('birthDate')->add('isACertifiedPilot');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getfirstName()
    {
        return 'AppBundle\Form\RegistrationType';
    }

    public function getlastName()
    {
        return 'AppBundle\Form\RegistrationType';
    }

    public function getphoneNumber()
    {
        return 'AppBundle\Form\RegistrationType';
    }

    public function getbirthDate()
    {
        return 'AppBundle\Form\RegistrationType';
    }

    public function isACertifiedPilot()
    {
        return 'AppBundle\Form\RegistrationType';
    }


}
