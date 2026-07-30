<?php

namespace App\Controller\Admin;

use App\Entity\Chantier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ChantierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chantier::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomChantier'),
            TextField::new('adresse'),
            DateField::new('dateDebut'),
            DateField::new('dateFinPrevue'),
            TextField::new('statut'),
            TextareaField::new('description'),
            AssociationField::new('client'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, fn(Action $a) => $a)
            ->update(Crud::PAGE_INDEX, Action::EDIT, fn(Action $a) => $a);
    }
}
