<?php

namespace App\Form;

use App\Entity\Contrat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContratType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name')
            ->add('Num_Contrat')
            ->add('start')
            ->add('end')
            ->add('nombre_H_totale')
            ->add('nombre_H_restant')
            ->add('etat_contrat')
            ->add('description')
            ->add('prix')
            ->add('forfait')
            ->add('frais_transport')
            ->add('type')
            ->add('Num_Contrat_Cadre')
            ->add('Nb_expert_jours')
            ->add('Homme_Jours_Experts')
            ->add('TeamExperts')
            ->add('client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contrat::class,
        ]);
    }
}
