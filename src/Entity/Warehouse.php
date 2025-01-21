<?php

namespace App\Entity;

use App\Repository\WarehouseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WarehouseRepository::class)]
class Warehouse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\ManyToMany(targetEntity: Product::class, inversedBy: 'warehouses')]
    private Collection $product_id;

    /**
     * @var Collection<int, UserRoleWarehouse>
     */
    #[ORM\OneToMany(targetEntity: UserRoleWarehouse::class, mappedBy: 'warehouse_id')]
    private Collection $userRoleWarehouses;

    public function __construct()
    {
        $this->product_id = new ArrayCollection();
        $this->userRoleWarehouses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductId(): Collection
    {
        return $this->product_id;
    }

    public function addProductId(Product $productId): static
    {
        if (!$this->product_id->contains($productId)) {
            $this->product_id->add($productId);
        }

        return $this;
    }

    public function removeProductId(Product $productId): static
    {
        $this->product_id->removeElement($productId);

        return $this;
    }

    /**
     * @return Collection<int, UserRoleWarehouse>
     */
    public function getUserRoleWarehouses(): Collection
    {
        return $this->userRoleWarehouses;
    }

    public function addUserRoleWarehouse(UserRoleWarehouse $userRoleWarehouse): static
    {
        if (!$this->userRoleWarehouses->contains($userRoleWarehouse)) {
            $this->userRoleWarehouses->add($userRoleWarehouse);
            $userRoleWarehouse->setWarehouse($this);
        }

        return $this;
    }

    public function removeUserRoleWarehouse(UserRoleWarehouse $userRoleWarehouse): static
    {
        if ($this->userRoleWarehouses->removeElement($userRoleWarehouse)) {
            // set the owning side to null (unless already changed)
            if ($userRoleWarehouse->getWarehouse() === $this) {
                $userRoleWarehouse->setWarehouse(null);
            }
        }

        return $this;
    }
}
