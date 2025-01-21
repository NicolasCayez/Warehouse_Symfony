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

    #[ORM\Column(length: 50)]
    private ?string $wh_name = null;

    #[ORM\Column(length: 13, nullable: true)]
    private ?string $wh_phone = null;

    #[ORM\Column(nullable: true)]
    private ?int $wh_address_number = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $wh_address_road = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $wh_address_label = null;

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $wh_address_postal_code = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $wh_address_city = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $wh_address_state = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $wh_address_country = null;

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

    public function getWhName(): ?string
    {
        return $this->wh_name;
    }

    public function setWhName(string $wh_name): static
    {
        $this->wh_name = $wh_name;

        return $this;
    }

    public function getWhPhone(): ?string
    {
        return $this->wh_phone;
    }

    public function setWhPhone(?string $wh_phone): static
    {
        $this->wh_phone = $wh_phone;

        return $this;
    }

    public function getWhAddressNumber(): ?int
    {
        return $this->wh_address_number;
    }

    public function setWhAddressNumber(?int $wh_address_number): static
    {
        $this->wh_address_number = $wh_address_number;

        return $this;
    }

    public function getWhAddressRoad(): ?string
    {
        return $this->wh_address_road;
    }

    public function setWhAddressRoad(?string $wh_address_road): static
    {
        $this->wh_address_road = $wh_address_road;

        return $this;
    }

    public function getWhAddressLabel(): ?string
    {
        return $this->wh_address_label;
    }

    public function setWhAddressLabel(?string $wh_address_label): static
    {
        $this->wh_address_label = $wh_address_label;

        return $this;
    }

    public function getWhAddressPostalCode(): ?string
    {
        return $this->wh_address_postal_code;
    }

    public function setWhAddressPostalCode(?string $wh_address_postal_code): static
    {
        $this->wh_address_postal_code = $wh_address_postal_code;

        return $this;
    }

    public function getWhAddressCity(): ?string
    {
        return $this->wh_address_city;
    }

    public function setWhAddressCity(?string $wh_address_city): static
    {
        $this->wh_address_city = $wh_address_city;

        return $this;
    }

    public function getWhAddressState(): ?string
    {
        return $this->wh_address_state;
    }

    public function setWhAddressState(?string $wh_address_state): static
    {
        $this->wh_address_state = $wh_address_state;

        return $this;
    }

    public function getWhAddressCountry(): ?string
    {
        return $this->wh_address_country;
    }

    public function setWhAddressCountry(?string $wh_address_country): static
    {
        $this->wh_address_country = $wh_address_country;

        return $this;
    }
}
