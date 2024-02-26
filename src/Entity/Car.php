<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $license_plate = null;

    #[ORM\Column(length: 255)]
    private ?string $make = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $mileage = null;

    #[ORM\Column(nullable: true)]
    private ?int $seats = null;

    #[ORM\Column(nullable: true)]
    private ?int $doors = null;

    #[ORM\Column(nullable: true)]
    private ?int $production_year = null;

    #[ORM\Column(nullable: true)]
    private ?int $weight = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sold_at = null;

    #[ORM\Column]
    private ?int $views = 0;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\ManyToOne(inversedBy: 'car')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToMany(targetEntity: CarTag::class, mappedBy: 'car')]
    private Collection $carTags;

    public function __construct()
    {
        $this->carTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicensePlate(): ?string
    {
        return $this->license_plate;
    }

    public function setLicensePlate(string $license_plate): static
    {
        $this->license_plate = $license_plate;

        return $this;
    }

    public function getMake(): ?string
    {
        return $this->make;
    }

    public function setMake(string $make): static
    {
        $this->make = $make;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(?int $seats): static
    {
        $this->seats = $seats;

        return $this;
    }

    public function getDoors(): ?int
    {
        return $this->doors;
    }

    public function setDoors(?int $doors): static
    {
        $this->doors = $doors;

        return $this;
    }

    public function getProductionYear(): ?int
    {
        return $this->production_year;
    }

    public function setProductionYear(?int $production_year): static
    {
        $this->production_year = $production_year;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getSoldAt(): ?\DateTimeInterface
    {
        return $this->sold_at;
    }

    public function setSoldAt(?\DateTimeInterface $sold_at): static
    {
        $this->sold_at = $sold_at;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): static
    {
        $this->views = $views;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, CarTag>
     */
    public function getCarTags(): Collection
    {
        return $this->carTags;
    }

    public function addCarTag(CarTag $carTag): static
    {
        if (!$this->carTags->contains($carTag)) {
            $this->carTags->add($carTag);
            $carTag->setCar($this);
        }

        return $this;
    }

    public function removeCarTag(CarTag $carTag): static
    {
        if ($this->carTags->removeElement($carTag)) {
            // set the owning side to null (unless already changed)
            if ($carTag->getCar() === $this) {
                $carTag->setCar(null);
            }
        }

        return $this;
    }
}
