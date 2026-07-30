<?php

namespace App\Controller\Admin;

use App\Entity\StockConsommable;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class StockConsommableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StockConsommable::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            IntegerField::new('quantite'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, fn(Action $a) => $a)
            ->update(Crud::PAGE_INDEX, Action::EDIT, fn(Action $a) => $a);
    }
}
