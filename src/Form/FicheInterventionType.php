<?php

namespace App\Form;

use App\Entity\FicheIntervention;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheInterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id')
            ->add('Nom_intervention')
            ->add('Date_intervention')
            ->add('Type_intervention')
            ->add('nombre_H_realise')
            ->add('description')
            ->add('Lieu_intervention')
            ->add('Expert')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FicheIntervention::class,
        ]);
    }
}
