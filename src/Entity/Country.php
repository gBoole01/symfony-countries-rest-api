<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $native = null;

    #[ORM\Column(length: 10)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $continent = null;

    #[ORM\Column(length: 255)]
    private ?string $capital = null;

    #[ORM\Column(length: 10)]
    private ?string $currency = null;

    #[ORM\Column(length: 255)]
    private ?string $emoji = null;

    public function __construct(
        string $code,
        string $name,
        string $native,
        string $phone,
        string $continent,
        string $capital,
        string $currency,
        string $emoji
    )
    {

        $this->code = $code;
        $this->name = $name;
        $this->native = $native;
        $this->phone = $phone;
        $this->continent = $continent;
        $this->capital = $capital;
        $this->currency = $currency;
        $this->emoji = $emoji;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getNative(): ?string
    {
        return $this->native;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getContinent(): ?string
    {
        return $this->continent;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function getEmoji(): ?string
    {
        return $this->emoji;
    }
}