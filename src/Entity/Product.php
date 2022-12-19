<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @Assert\NotBlank()
     */
    #[ORM\Column]
    #[Assert\Type('float')]
    private ?float $price = null;

    /**
     * @Assert\NotBlank()
     */
    #[ORM\Column(length: 255)]
    #[Assert\Type('string')]
    private ?string $name = null;

    /**
     * @Assert\NotBlank()
     */
    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?TaxResident $taxResident = null;


    public function __toString(): string
    {
        return $this->name . ' ' . $this->price;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTaxResident(): ?TaxResident
    {
        return $this->taxResident;
    }

    public function setTaxResident(?TaxResident $taxResident): self
    {
        $this->taxResident = $taxResident;

        return $this;
    }

    public function getRoundPrice(): float
    {
        return round($this->price, 2) ;
    }
}
