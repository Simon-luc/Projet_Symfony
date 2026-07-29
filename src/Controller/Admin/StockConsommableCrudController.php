<?php

namespace App\Controller\Admin;

use App\Entity\StockConsommable;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class StockConsommableCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StockConsommable::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action;
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action;
            });
    }
}
