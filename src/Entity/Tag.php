<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TagRepository::class)]
class Tag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $color = null;

    #[ORM\OneToMany(targetEntity: CarTag::class, mappedBy: 'tag')]
    private Collection $carTags;

    public function __construct()
    {
        $this->carTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

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
            $carTag->setTag($this);
        }

        return $this;
    }

    public function removeCarTag(CarTag $carTag): static
    {
        if ($this->carTags->removeElement($carTag)) {
            // set the owning side to null (unless already changed)
            if ($carTag->getTag() === $this) {
                $carTag->setTag(null);
            }
        }

        return $this;
    }
}
