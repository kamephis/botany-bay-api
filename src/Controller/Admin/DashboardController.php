<?php

namespace App\Controller\Admin;

use App\Entity\Family;
use App\Entity\Genus;
use App\Entity\Plant;
use App\Entity\Species;
use App\Entity\TaxonomyLevels;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\PlantRepository;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        public PlantRepository $repository
    )
    {
    }

    /**
     * @return Response
     */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $plants = $this->repository->findAll();
        return $this->render('admin/index.html.twig', [
            'plants' => $plants,
        ]);
    }

    /**
     * @return Dashboard
     */
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="/img/logo_black.svg" alt="Botany Bay Logo" style="width: 90%">')
            ->setFaviconPath('/img/icon.svg')
            ->disableDarkMode()
            ->setLocales([
                'de' => '🇩🇪 Deutsch',
                'en' => '🇬🇧 English'
            ]);
    }

    /**
     * @return iterable
     */
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Plants', 'fa-solid fa-seedling', Plant::class)
            ->setController(PlantCrudController::class);
        yield MenuItem::linkToCrud('Family', 'fa-solid fa-sitemap', Family::class)
            ->setController(FamilyCrudController::class);
        yield MenuItem::linkToCrud('Species', 'fa-sharp fa-solid fa-dna', Species::class)
            ->setController(SpeciesCrudController::class);
        yield MenuItem::linkToCrud('Genus', 'fa-solid fa-leaf', Genus::class)
            ->setController(GenusCrudController::class);

        yield MenuItem::subMenu('Taxonomy', 'fa-solid fa-leaf')
            ->setSubItems([
                MenuItem::linkToCrud('Levels', 'fa-solid fa-leaf', TaxonomyLevels::class)
                    ->setController(TaxonomyLevelsCrudController::class)
            ]);
        yield MenuItem::subMenu('Admin', 'fa-solid fa-screwdriver-wrench')
            ->setSubItems([
                MenuItem::linkToCrud('Users', 'fa-user fa-solid fa-user', User::class)
                    ->setController(UserCrudController::class)
            ]);
    }

    /**
     * @param User|UserInterface $user
     * @return UserMenu
     */
    public function configureUserMenu(User|UserInterface $user): UserMenu
    {
        /*@todo: add the future controllers*/
        return parent::configureUserMenu($user)
            ->setGravatarEmail($user->getEmail())
            ->addMenuItems([
                MenuItem::linkToRoute('My Profile', 'fa fa-id-card', '...', ['...' => '...']),
                MenuItem::linkToRoute('Settings', 'fa fa-user-cog', '...', ['...' => '...']),
                MenuItem::section(),
            ]);
    }
}
