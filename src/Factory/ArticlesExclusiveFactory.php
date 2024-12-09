<?php

namespace App\Factory;

use App\Entity\ArticlesExclusive;
use App\Repository\ArticlesExclusiveRepository;
use Doctrine\ORM\EntityRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<ArticlesExclusive>
 *
 * @method        ArticlesExclusive|Proxy create(array|callable $attributes = [])
 * @method static ArticlesExclusive|Proxy createOne(array $attributes = [])
 * @method static ArticlesExclusive|Proxy find(object|array|mixed $criteria)
 * @method static ArticlesExclusive|Proxy findOrCreate(array $attributes)
 * @method static ArticlesExclusive|Proxy first(string $sortedField = 'id')
 * @method static ArticlesExclusive|Proxy last(string $sortedField = 'id')
 * @method static ArticlesExclusive|Proxy random(array $attributes = [])
 * @method static ArticlesExclusive|Proxy randomOrCreate(array $attributes = [])
 * @method static ArticlesExclusiveRepository|ProxyRepositoryDecorator repository()
 * @method static ArticlesExclusive[]|Proxy[] all()
 * @method static ArticlesExclusive[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static ArticlesExclusive[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static ArticlesExclusive[]|Proxy[] findBy(array $attributes)
 * @method static ArticlesExclusive[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ArticlesExclusive[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ArticlesExclusiveFactory extends PersistentProxyObjectFactory{
    private const ARTICLES_NAMES = [
        'Camiseta Atardecer Retro',
        'Sudadera Sueños Cósmicos',
        'Sudadera Logo Minimalista',
        'Camiseta Explorador de Montañas',
        'Sudadera Vibras Neón',
        'Camiseta Patrones Abstractos',
        'Sudadera Estampa Galáctica',
        'Camiseta Rayas Vintage',
        'Sudadera Flor Silvestre',
        'Sudadera Estilo Skater',
        'Camiseta Jungla Urbana',
        'Sudadera Camuflaje Ártico',
        'Sudadera Pixel Art',
        'Camiseta Graffiti Splash',
        'Sudadera Esenciales Streetwear',
        'Camiseta Brisa Oceánica',
        'Sudadera Clásica Monocromática',
        'Sudadera Tipografía Audaz',
        'Camiseta Espejismo del Desierto',
        'Sudadera Boceto Floral',
        'Sudadera Cuadrícula Futurista',
        'Camiseta Palmas de Verano',
        'Sudadera Cabaña Invernal',
        'Sudadera Arcade Retro',
        'Camiseta Plumas Boho',
        'Sudadera Luces de Ciudad',
        'Sudadera Eclipse Lunar',
        'Camiseta Líneas Geométricas',
        'Sudadera Paraíso Tropical',
        'Sudadera Estética Grunge',
        'Camiseta Arte Moderno',
        'Sudadera Polvo Galáctico',
        'Sudadera Sueños Pastel',
        'Camiseta Oeste Salvaje',
        'Sudadera Hora Dorada',
        'Sudadera Estilo Tech Noir',
        'Camiseta Senderos de Aventura',
        'Sudadera Vibras de Festival',
        'Sudadera Gradiente Horizonte',
        'Camiseta Cielo Estrellado',
        'Sudadera Caras Abstractas',
        'Sudadera Pop Eléctrico',
        'Camiseta Olas Oníricas',
        'Sudadera Expedición Safari',
        'Sudadera Arte Callejero',
        'Camiseta Llama Solar',
        'Sudadera Niebla Mística',
        'Sudadera Gráficos Audaces',
        'Camiseta Noches Nórdicas',
        'Sudadera Autos Vintage',
        'Sudadera Futuro Digital',
        'Camiseta Eco Nómada',
        'Sudadera Bosque Salvaje'
    ];

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return ArticlesExclusive::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'created_at' => \DateTimeImmutable::createFromMutable(self::faker()->dateTimeBetween('-1 year')),
            'description' => self::faker()->paragraph(),
            'name' => self::faker()->randomElement(self::ARTICLES_NAMES),
            'onSale' => self::faker()->boolean(),
            'price' =>self::faker()->numberBetween(50, 200),
            'exclusivityLevel' => self::faker()->numberBetween(0,10),
            'stock' => self::faker()->numberBetween(0,1000),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(ArticlesExclusive $articlesExclusive): void {})
        ;
    }
}
