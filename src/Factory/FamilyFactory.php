<?php

namespace App\Factory;

use App\Entity\Family;
use App\Repository\FamilyRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Family>
 *
 * @method        Family|Proxy create(array|callable $attributes = [])
 * @method static Family|Proxy createOne(array $attributes = [])
 * @method static Family|Proxy find(object|array|mixed $criteria)
 * @method static Family|Proxy findOrCreate(array $attributes)
 * @method static Family|Proxy first(string $sortedField = 'id')
 * @method static Family|Proxy last(string $sortedField = 'id')
 * @method static Family|Proxy random(array $attributes = [])
 * @method static Family|Proxy randomOrCreate(array $attributes = [])
 * @method static FamilyRepository|RepositoryProxy repository()
 * @method static Family[]|Proxy[] all()
 * @method static Family[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Family[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Family[]|Proxy[] findBy(array $attributes)
 * @method static Family[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Family[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class FamilyFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'scientific_name' => self::faker()->text(128),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Family $family): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Family::class;
    }
}
