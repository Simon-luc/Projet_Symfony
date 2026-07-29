<?php

namespace App\Controller\Admin;

use App\Entity\Chantier;
use App\Entity\Client;
use App\Entity\Consomme;
use App\Entity\Devis;
use App\Entity\Intervention;
use App\Entity\Materiel;
use App\Entity\StockConsommable;
use App\Entity\Utilise;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ChantierCrudController;
use App\Controller\Admin\ClientCrudController;
use App\Controller\Admin\ConsommeCrudController;
use App\Controller\Admin\DevisCrudController;
use App\Controller\Admin\InterventionCrudController;
use App\Controller\Admin\MaterielCrudController;
use App\Controller\Admin\StockConsommableCrudController;
use App\Controller\Admin\UtiliseCrudController;
use App\Controller\Admin\UtilisateurCrudController;


#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mon Projet');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkTo(ClientCrudController::class, 'Clients', 'fa fa-users');

        yield MenuItem::linkTo(ChantierCrudController::class, 'Chantiers', 'fa fa-building');

        yield MenuItem::linkTo(DevisCrudController::class, 'Devis', 'fa fa-file-invoice');

        yield MenuItem::linkTo(InterventionCrudController::class, 'Interventions', 'fa fa-tools');

        yield MenuItem::linkTo(MaterielCrudController::class, 'Matériel', 'fa fa-box');

        yield MenuItem::linkTo(StockConsommableCrudController::class, 'Stock Consommable', 'fa fa-boxes');

        yield MenuItem::linkTo(UtiliseCrudController::class, 'Utilisations', 'fa fa-link');

        yield MenuItem::linkTo(ConsommeCrudController::class, 'Consommations', 'fa fa-link');

        yield MenuItem::linkTo(UtilisateurCrudController::class, 'Utilisateurs', 'fa fa-user');

    }
}
