<?php

namespace PageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;


class ContactType extends AbstractType
{

    public function getName(){
        return '';
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('contact_name', 'text', array(
                'label' => 'Imie',
                'required' => false,
            ))
            ->add('group_id', 'entity', array(
                'class' => 'PageBundle\Entity\Groups',
                'label' => 'Nazwa grupy',
                'query_builder' => function(EntityRepository $repository) {

                        return $repository->createQueryBuilder('c')->where('c.group_archive = 0');
                },
            ))
            ->add('contact_surname', 'text', array(
                'label' => 'Nazwisko',
                'required' => false,
            ))
            ->add('contact_province', 'choice', array(
                'label' => 'Województwo',
                'choices' => array(
                    'dolnoslaskie' => 'Dolnośląskie',
                    'kujawsko-pomorskie' => 'Kujawsko - Pomorskie',
                    'lubelskie' => 'Lubelskie',
                    'lubuskie' => 'Lubuskie',
                    'lodzkie' => 'Łódzkie',
                    'malopolskie' => 'Małopolskie',
                    'mazowieckie' => 'Mazowieckie',
                    'opolskie' => 'Opolskie',
                    'podkarpackie' => 'Podkarpackie',
                    'podlaskie' => 'Podlaskie',
                    'pomorskie' => 'Pomorskie',
                    'slaskie' => 'Śląskie',
                    'swietokrzyskie' => 'Świętokrzyskie',
                    'warminsko-mazurskie' => 'Warmińsko - Mazurskie',
                    'wielkopolskie' => 'Wielkopolskie',
                    'zachodnio-pomorskie' => 'Zachodnio - Pomorskie',
                ),

            ))
            ->add('contact_city', 'text', array(
                'label' => 'Miasto',
                'required' => false,
            ))
            ->add('contact_street', 'text', array(
                'label' => 'Ulica',
                'required' => false,
            ))
            ->add('contact_home_number', 'text', array(
                'label' => 'Numer domu',
                'required' => false,
            ))
            ->add('contact_postal_code', 'text', array(
                'label' => 'Kod pocztowy',
                'required' => false,
            ))
            ->add('contact_email', 'text', array(
                'label' => 'Adres e-mail',
                'required' => false,
            ))
            ->add('contact_phone', 'text', array(
                'label' => 'Numer telefonu',
                'required' => false,
            ))
            ->add('add', 'submit', array(
                'label' => 'Dodaj kontakt',

            ));
    }

    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver){
        $resolver->setDefaults(array(
            'data_class' => 'PageBundle\Entity\Contact',
        ));
    }

}