<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Doctrine\ORM\EntityRepository;
use App\Entity\Entreprise;
use App\Entity\User;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('entreprise', EntityType::class, [
            'class' => Entreprise::class,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('e')
                ->leftJoin('e.user', 'u')
                ->addSelect('u')
                ->orderBy('u.username', 'ASC');
            },
            'choice_label' => 'user.username'
        ])
           
            ->add('user', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                    ->where('u.userPro is NULL')
                    ->andWhere('u.username != :admin')
                    ->orderBy('u.username', 'ASC')
                    ->setParameter('admin', 'adminuser');
                },
                'choice_label' => 'username'
            ])

            ->add('dateTemp', HiddenType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('heure', HiddenType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
