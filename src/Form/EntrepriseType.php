<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation')
            ->add('adress')
            ->add('contact')
            ->add('email')
            ->add('latitude')
            ->add('longitude')
            ->add('description')
            ->add('partener');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
            'translation_domain' => 'entreprise'
        ]);
    }
}
