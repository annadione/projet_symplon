<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('roles', CollectionType::class,[
                'entry_type' => ChoiceType::class,
                'entry_options' =>[
                    'label' => false,
                    'choices' => [
                        '' => '',
                        'Gerant' => 'ROLE_GERANT',
                        'Admin' => 'ROLE_ADMIN'
                    ]
                ]
            ])
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance')
            ->add('adresse')
            ->add('telephone')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
