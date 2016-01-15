<?php

namespace PageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class GroupsType extends AbstractType
{

    public function getName(){
        return '';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('group_name', 'text', array(
                'label' => 'Nazwa grupy',
            ))
            ->add('add', 'submit', array(
                'label' => 'Dodaj grupe',
            ));
    }

    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'PageBundle\Entity\Groups',
        ));
    }

}