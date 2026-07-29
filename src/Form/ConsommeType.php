<?php

namespace App\Form;

use App\Entity\Chantier;
use App\Entity\Consomme;
use App\Entity\StockConsommable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsommeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_consommation')
            ->add('quantite_consomme')
            ->add('chantier', EntityType::class, [
                'class' => Chantier::class,
                'choice_label' => 'id',
            ])
            ->add('stock_consommable', EntityType::class, [
                'class' => StockConsommable::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Consomme::class,
        ]);
    }
}
