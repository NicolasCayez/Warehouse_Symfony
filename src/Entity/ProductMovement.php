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
    private ?Product $product_id = null;

    #[ORM\ManyToOne(inversedBy: 'productMovements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Movement $mvmt_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?Product
    {
        return $this->product_id;
    }

    public function setProductId(?Product $product_id): static
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getMvmtId(): ?Movement
    {
        return $this->mvmt_id;
    }

    public function setMvmtId(?Movement $mvmt_id): static
    {
        $this->mvmt_id = $mvmt_id;

        return $this;
    }
}
