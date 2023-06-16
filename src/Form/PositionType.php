<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Position;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label')
            ->add('situation')
            ->add('studentId', EntityType::class, [
                'class' => Student::class,
                'choice_label' => 'fullname'
            ])
            ->add('entrepriseId', EntityType::class, [
                'class' => Entreprise::class,
                'choice_label' => 'designation'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Position::class,
            'translation_domain' => 'position'
        ]);
    }
}
