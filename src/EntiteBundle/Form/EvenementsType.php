<?php

namespace EntiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('description')->add('date')
            ->add('adresse')
            ->add('prix')
            ->add('type' ,ChoiceType::class, array(
        'choices'  => array(
            'Festival' => 'Festival'    ,
            'Soirée' => 'Soirée',
            'Fête' => 'Fête',
            'Sport'=>'Sport',
            'Randonée'=>'Randonée',
        ), ))
            ->add('brochure',FileType::class,array('data_class'=>null))
            ->add('Sauvgarder',SubmitType::class)
            -> setMethod('POST');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntiteBundle\Entity\Evenements'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitebundle_evenements';
    }


}
