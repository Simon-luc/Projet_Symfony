<?php

namespace App\Controller\Admin;

use App\Entity\Consomme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class ConsommeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Consomme::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date_consommation'),
            IntegerField::new('quantite_consomme'),
            AssociationField::new('chantier'),
            AssociationField::new('stock_consommable'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, fn(Action $a) => $a)
            ->update(Crud::PAGE_INDEX, Action::EDIT, fn(Action $a) => $a);
    }
}
