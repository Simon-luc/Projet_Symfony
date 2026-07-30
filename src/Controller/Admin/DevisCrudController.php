<?php

namespace App\Controller\Admin;

use App\Entity\Devis;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;


class DevisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Devis::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('numero_devis'),
            MoneyField::new('montant_total')->setCurrency('EUR'),
            DateField::new('date_creation'),
            TextField::new('statut'),
            AssociationField::new('client'),
            AssociationField::new('chantier'),
            AssociationField::new('utilisateur'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, fn(Action $a) => $a)
            ->update(Crud::PAGE_INDEX, Action::EDIT, fn(Action $a) => $a);
    }
}
