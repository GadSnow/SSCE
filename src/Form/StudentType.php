<?php

namespace App\Form;

use App\Entity\Skill;
use App\Entity\Speciality;
use App\Entity\Student;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Date;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('matricule')
            ->add('fullname')
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker']
            ])
            ->add('birthplace')
            ->add('phone')
            ->add('adress')
            ->add('email')
            ->add('speciality', EntityType::class, [
                "class" => Speciality::class,
                "choice_label" => "label"
            ])
            ->add('imageFile', FileType::class, [
                'required' =>  false
            ])
            ->add('skill', EntityType::class, [
                'class' => Skill::class,
                "choice_label" => "label",
                "required" =>  false,
                "multiple" => true,
                'attr' => ['class' => 'skill']
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
