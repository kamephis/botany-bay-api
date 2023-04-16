<?php

namespace App\Factory;

use App\Entity\Genus;
use App\Repository\GenusRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Genus>
 *
 * @method        Genus|Proxy create(array|callable $attributes = [])
 * @method static Genus|Proxy createOne(array $attributes = [])
 * @method static Genus|Proxy find(object|array|mixed $criteria)
 * @method static Genus|Proxy findOrCreate(array $attributes)
 * @method static Genus|Proxy first(string $sortedField = 'id')
 * @method static Genus|Proxy last(string $sortedField = 'id')
 * @method static Genus|Proxy random(array $attributes = [])
 * @method static Genus|Proxy randomOrCreate(array $attributes = [])
 * @method static GenusRepository|RepositoryProxy repository()
 * @method static Genus[]|Proxy[] all()
 * @method static Genus[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Genus[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Genus[]|Proxy[] findBy(array $attributes)
 * @method static Genus[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Genus[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class GenusFactory extends ModelFactory
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
            'scientific_name' => self::faker()->text(64),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Genus $genus): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Genus::class;
    }
}
