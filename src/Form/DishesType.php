<?php

namespace App\Form;

use App\Entity\Dishes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DishesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('regime', ChoiceType::class, [
                'choices' => [
                    'Régimes végétals' => [
                        "Vegétarien" => "Végétarien",
                        "Végétalien" => "Végétalien",
                    ],
                    "Régime Religieux" => [
                        "Halal" => "Halal",
                        "Kasher" => "Kasher",
                        "Sikhiste" => "Sikhiste",
                        "Hindouisme" => "Hindou",
                    ]
                ]
            ])
            ->add('country', CountryType::class)
            ->add('spicy')
            ->add('note')
            ->add('name')
            ->add('btSend', SubmitType::class, ['label' => "envoyer"]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dishes::class,
        ]);
    }
}
