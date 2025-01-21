<?php

namespace App\Entity;

use App\Repository\ProductMovementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductMovementRepository::class)]
class ProductMovement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'productMovements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;

    #[ORM\ManyToOne(inversedBy: 'productMovements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Movement $mvmt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getMvmt(): ?Movement
    {
        return $this->mvmt;
    }

    public function setMvmt(?Movement $mvmt): static
    {
        $this->mvmt = $mvmt;

        return $this;
    }
}
