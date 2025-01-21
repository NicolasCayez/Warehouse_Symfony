<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Family>
     */
    #[ORM\ManyToMany(targetEntity: Family::class, inversedBy: 'products')]
    private Collection $family;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $brand = null;

    /**
     * @var Collection<int, ProductSize>
     */
    #[ORM\OneToMany(targetEntity: ProductSize::class, mappedBy: 'product_id', orphanRemoval: true)]
    private Collection $productSizes;

    /**
     * @var Collection<int, ProductColor>
     */
    #[ORM\OneToMany(targetEntity: ProductColor::class, mappedBy: 'product_id', orphanRemoval: true)]
    private Collection $productColors;

    /**
     * @var Collection<int, ProductInfo>
     */
    #[ORM\OneToMany(targetEntity: ProductInfo::class, mappedBy: 'product_id', orphanRemoval: true)]
    private Collection $productInfos;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Supplier $supplier = null;

    /**
     * @var Collection<int, ProductMovement>
     */
    #[ORM\OneToMany(targetEntity: ProductMovement::class, mappedBy: 'product_id')]
    private Collection $productMovements;

    /**
     * @var Collection<int, Warehouse>
     */
    #[ORM\ManyToMany(targetEntity: Warehouse::class, mappedBy: 'product_id')]
    private Collection $warehouses;

    public function __construct()
    {
        $this->family = new ArrayCollection();
        $this->productSizes = new ArrayCollection();
        $this->productColors = new ArrayCollection();
        $this->productInfos = new ArrayCollection();
        $this->productMovements = new ArrayCollection();
        $this->warehouses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Family>
     */
    public function getFamily(): Collection
    {
        return $this->family;
    }

    public function addFamilyId(Family $family): static
    {
        if (!$this->family->contains($family)) {
            $this->family->add($family);
        }

        return $this;
    }

    public function removeFamilyId(Family $family): static
    {
        $this->family->removeElement($family);

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection<int, ProductSize>
     */
    public function getProductSizes(): Collection
    {
        return $this->productSizes;
    }

    public function addProductSize(ProductSize $productSize): static
    {
        if (!$this->productSizes->contains($productSize)) {
            $this->productSizes->add($productSize);
            $productSize->setProduct($this);
        }

        return $this;
    }

    public function removeProductSize(ProductSize $productSize): static
    {
        if ($this->productSizes->removeElement($productSize)) {
            // set the owning side to null (unless already changed)
            if ($productSize->getProduct() === $this) {
                $productSize->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductColor>
     */
    public function getProductColors(): Collection
    {
        return $this->productColors;
    }

    public function addProductColor(ProductColor $productColor): static
    {
        if (!$this->productColors->contains($productColor)) {
            $this->productColors->add($productColor);
            $productColor->setProduct($this);
        }

        return $this;
    }

    public function removeProductColor(ProductColor $productColor): static
    {
        if ($this->productColors->removeElement($productColor)) {
            // set the owning side to null (unless already changed)
            if ($productColor->getProduct() === $this) {
                $productColor->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductInfo>
     */
    public function getProductInfos(): Collection
    {
        return $this->productInfos;
    }

    public function addProductInfo(ProductInfo $productInfo): static
    {
        if (!$this->productInfos->contains($productInfo)) {
            $this->productInfos->add($productInfo);
            $productInfo->setProduct($this);
        }

        return $this;
    }

    public function removeProductInfo(ProductInfo $productInfo): static
    {
        if ($this->productInfos->removeElement($productInfo)) {
            // set the owning side to null (unless already changed)
            if ($productInfo->getProduct() === $this) {
                $productInfo->setProduct(null);
            }
        }

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): static
    {
        $this->supplier = $supplier;

        return $this;
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
            $productMovement->setProduct($this);
        }

        return $this;
    }

    public function removeProductMovement(ProductMovement $productMovement): static
    {
        if ($this->productMovements->removeElement($productMovement)) {
            // set the owning side to null (unless already changed)
            if ($productMovement->getProduct() === $this) {
                $productMovement->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Warehouse>
     */
    public function getWarehouses(): Collection
    {
        return $this->warehouses;
    }

    public function addWarehouse(Warehouse $warehouse): static
    {
        if (!$this->warehouses->contains($warehouse)) {
            $this->warehouses->add($warehouse);
            $warehouse->addProductId($this);
        }

        return $this;
    }

    public function removeWarehouse(Warehouse $warehouse): static
    {
        if ($this->warehouses->removeElement($warehouse)) {
            $warehouse->removeProductId($this);
        }

        return $this;
    }
}
