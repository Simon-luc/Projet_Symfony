<?php

namespace App\Controller\Admin;

use App\Entity\Utilise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class UtiliseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilise::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('chantier'),
            AssociationField::new('materiel'),
            AssociationField::new('intervention'),
            DateField::new('date_de_debut'),
            DateField::new('date_de_fin'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, fn(Action $a) => $a)
            ->update(Crud::PAGE_INDEX, Action::EDIT, fn(Action $a) => $a);
    }
}
