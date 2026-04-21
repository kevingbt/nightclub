<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Soiree;
use App\Entity\Theme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Soiree1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'label' => 'Titre de la soirée',
            ])
            ->add('dateSoiree', null, [
                'widget' => 'single_text',
                'label' => 'Date de la soirée',
            ])
            ->add('dateCreation', null, [
                'widget' => 'single_text',
                'label' => 'Date de création',
            ])
            ->add('statut')
            ->add("soiree_artiste", EntityType::class, [
                'class' => Artiste::class,
                'choice_label' => function (Artiste $artiste) {
                    return $artiste->getPrenom() . ' ' . $artiste->getNom();
                },
                'multiple' => true,
                'required' => false,
                'label' => 'Artistes invités',
            ])
            ->add("theme_soiree", EntityType::class, [
                'class' => Theme::class,
                'choice_label' => 'nom',
                'multiple' => false,
                'required' => false,
                'label' => 'Thème de la soirée',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Soiree::class,
        ]);
    }
}
