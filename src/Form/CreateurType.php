<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Createur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Nom entreprise'
            ])
            ->add('nom')
            ->add('prenom', null, [
                'label' => 'Prénom'
            ])
            ->add('description')
            ->add('minidescriptif', null, [
                'label' => 'Mini descriptif'
            ])
            ->add('adresse')
            ->add('codepostal', null, [
                'label' => 'Code Postal'
            ])
            ->add('ville')
            ->add('telephone', null, [
                'label' => 'Téléphone'
            ])
            ->add('email')
            ->add('facebook')
            ->add('instagram')
            ->add('twitter')
            ->add('internet')
            ->add ('categories', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
            ->add('images', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
            
            ->add('lat')
            ->add('lng')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Createur::class,
        ]);
    }
}
