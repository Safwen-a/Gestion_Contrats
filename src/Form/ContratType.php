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
            ->add('Num_Contrat_Cadre') ->add('type',ChoiceType::class)
            ->add('start')  ->add('end')
            ->add('nombre_H_totale')
            ->add('TeamExperts')
            ->add('Nb_expert_jours')
            ->add('prix') ->add('forfait') ->add('frais_transport')
            ->add('Homme_Jours_Experts')
            ->add('description')
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
