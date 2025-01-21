<?php

namespace App\Entity;

use App\Repository\MovementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;

#[ORM\Entity(repositoryClass: MovementRepository::class)]
// #[InheritanceType('SINGLE_TABLE')]
#[InheritanceType('JOINED')]
#[DiscriminatorColumn(name: 'mvmt_type', type: 'string')]
#[DiscriminatorMap([
    'movement' => Movement::class,
    'inventory' => Inventory::class,
    'stockModification' => StockModification::class,
    'productReception' => ProductReception::class,
    'stockTransfert' => StockTransfert::class])]
class Movement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, ProductMovement>
     */
    #[ORM\OneToMany(targetEntity: ProductMovement::class, mappedBy: 'mvmt_id')]
    private Collection $productMovements;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $mvmt_date = null;

    public function __construct()
    {
        $this->productMovements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ProductMovement>
     */
    public function getProductMovements(): Collection
    {
        return $this->productMovements;
    }

    public function addProductMovement(ProductMovement $productMovement): static
    {
        if (!$this->productMovements->contains($productMovement)) {
            $this->productMovements->add($productMovement);
            $productMovement->setMvmt($this);
        }

        return $this;
    }

    public function removeProductMovement(ProductMovement $productMovement): static
    {
        if ($this->productMovements->removeElement($productMovement)) {
            // set the owning side to null (unless already changed)
            if ($productMovement->getMvmt() === $this) {
                $productMovement->setMvmt(null);
            }
        }

        return $this;
    }

    public function getMvmtDate(): ?\DateTimeImmutable
    {
        return $this->mvmt_date;
    }

    public function setMvmtDate(\DateTimeImmutable $mvmt_date): static
    {
        $this->mvmt_date = $mvmt_date;

        return $this;
    }
}
