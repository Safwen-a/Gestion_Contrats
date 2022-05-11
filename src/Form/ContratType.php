<?php

namespace App\Form;

use App\Entity\Contrat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ContratType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name') ->add('Num_Contrat') ->add('client')
            ->add('Num_Contrat_Cadre') ->add('type')
            ->add('start')  ->add('end')
            ->add('TeamExperts')
            ->add('forfait') 
            ->add('expertjours')
            ->add('HommeJours')
            ->add('Frais_Service')
            ->add('frais_transport')
            ->add('Remuneration_totale')
            ->add('Enregistrer',SubmitType::class)
            ->add('Annuler',ResetType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contrat::class,
        ]);
    }
}
