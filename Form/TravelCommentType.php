<?php

namespace TravelBundle\Form\Travel;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

class TravelCommentType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('text');
        $builder->add('name');
        $builder->add('email', 'email', array('required' => false ));
        $builder->add('website', 'text', array('required' => false ));
        $builder->add('captcha', 'captcha');
    }

    public function getName()
    {
        return "travelcomment_user_form";
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TravelBundle\Entity\Travel\TravelComment',
        ));
    }

}
