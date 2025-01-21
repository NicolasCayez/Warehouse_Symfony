<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, UserRoleWarehouse>
     */
    #[ORM\OneToMany(targetEntity: UserRoleWarehouse::class, mappedBy: 'role')]
    private Collection $warehouse;

    public function __construct()
    {
        $this->warehouse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, UserRoleWarehouse>
     */
    public function getWarehouse(): Collection
    {
        return $this->warehouse;
    }

    public function addWarehouse(UserRoleWarehouse $warehouse): static
    {
        if (!$this->warehouse->contains($warehouse)) {
            $this->warehouse->add($warehouse);
            $warehouse->setRole($this);
        }

        return $this;
    }

    public function removeWarehouseId(UserRoleWarehouse $warehouse): static
    {
        if ($this->warehouse->removeElement($warehouse)) {
            // set the owning side to null (unless already changed)
            if ($warehouse->getRole() === $this) {
                $warehouse->setRole(null);
            }
        }

        return $this;
    }
}
