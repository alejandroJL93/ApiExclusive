<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Serializer\Filter\PropertyFilter;
use App\Repository\ArticlesExclusiveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticlesExclusiveRepository::class)]
#[ApiResource (
    shortName: "article",
    description: "Articulos de la tienda exclusive",
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Patch(),
        new Delete(),
    ],
    normalizationContext: [
        'groups' => ['article:read']
    ],
    denormalizationContext: ['groups' => ['article:write']],
    paginationItemsPerPage: 10,
)]
#[ApiFilter(PropertyFilter::class)]
class ArticlesExclusive
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["article:read","article:write"])]
    #[ApiFilter(SearchFilter::class,strategy: 'partial')]
    #[Assert\NotBlank]
    #[Assert\Length(min:2,max:255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["article:read","article:write"])]
    #[ApiFilter(SearchFilter::class,strategy: 'partial')]
    #[Assert\NotBlank]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(["article:read","article:write"])]
    #[ApiFilter(RangeFilter::class)]
    #[Assert\NotBlank]
    #[Assert\GreaterThan(0)]
    private ?int $price = null;
    /**
     * Stock disponible.
     */
    #[ORM\Column(nullable: true)]
    #[Groups(["article:read","article:write"])]
    private ?int $stock = null;

    #[ORM\Column]
    #[Groups(["article:read","article:write"])]
    #[Assert\NotBlank]
    private ?\DateTimeImmutable $created_at = null;
    /**
     * Cantidad estimada de exclusividad, medida en Posibles compradores/stock disponible
     */
    #[ORM\Column]
    #[Groups(["article:read","article:write"])]
    #[Assert\GreaterThanOrEqual(0)]
    #[Assert\LessThanOrEqual(10)]
    private ?int $exclusivityLevel = 0;
    /**
     * Esta a la venta o no.
     */
    #[ORM\Column]
    #[Groups(["article:read","article:write"])]
    #[ApiFilter(BooleanFilter::class)]
    #[Assert\NotBlank]
    private ?bool $onSale = true;

    public function __construct(string $name=null)
    {
        $this->name=$name;
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }
    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getExclusivityLevel(): ?int
    {
        return $this->exclusivityLevel;
    }

    public function setExclusivityLevel(int $exclusivityLevel): static
    {
        $this->exclusivityLevel = $exclusivityLevel;

        return $this;
    }

    public function getOnSale(): ?bool
    {
        return $this->onSale;
    }

    public function setOnSale(bool $onSale): static
    {
        $this->onSale = $onSale;

        return $this;
    }
}
