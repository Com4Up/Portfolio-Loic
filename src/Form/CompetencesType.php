<?php

namespace App\Form;

use App\Entity\Competences;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class CompetencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('type', ChoiceType::class, [
                'choices'=> array(
                    'scolaire' => 'scolaire',
                    'professionel' => 'professionel',
                ),
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('description',TextareaType::class)
            ->add('poste')
            ->add('dateDebut',DateTimeType::class)
            ->add('dateFin',DateTimeType::class)
            ->add('lieu')
            ->add('URLWeb')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competences::class,
        ]);
    }
}
