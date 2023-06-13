<?php

namespace App\Form;

use App\Entity\CourseOfLife;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseOfLifeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
                'required' => false
            ])
            ->add('studentId', EntityType::class, [
                'class' => Student::class,
                'choice_label' => 'matricule',
                'attr' => [
                    'class' => 'skill',
                    'name' => 'file'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CourseOfLife::class,
            'translation_domain' => 'cv'
        ]);
    }
}
