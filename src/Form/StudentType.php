<?php

namespace App\Form;

use App\Entity\Speciality;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('fullname')
            ->add('birthday')
            ->add('birthplace')
            ->add('phone')
            ->add('adress')
            ->add('email')
            ->add('speciality', EntityType::class, [
                "class" => Speciality::class,
                "choice_label" => "label"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Student::class,
            'translation_domain' => 'student'
        ]);
    }
}
