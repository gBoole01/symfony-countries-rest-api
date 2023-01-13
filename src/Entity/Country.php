<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(operations: [
new GetCollection(),
new Get()
],
normalizationContext: ["groups" => ["countries:read"]],
)]
#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[UniqueEntity('code')]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[ApiProperty(identifier: false)]
    private ?int $id = null;

    /**
     * ISO Code of the country
     */
    #[Groups("countries:read")]
    #[ORM\Column(length: 255)]
    #[ApiProperty(identifier: true)]
    private ?string $code = null;

    /**
     * Name of the country
     */
    #[Groups("countries:read")]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * Country name, as pronouced by its native speakers
     */
    #[Groups("countries:read")]
    #[ORM\Column(length: 255)]
    private ?string $native = null;

    /**
     * Phone international code
     */
    #[Groups("countries:read")]
    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    /**
     * Continent where it belongs
     */
    #[Groups("countries:read")]
    #[ORM\Column(length: 255)]
    private ?string $continent = null;

    /**
     * Capital of the country
     */
    #[Groups("countries:read")]
    #[ORM\Column(length: 255)]
    private ?string $capital = null;

    /**
     * Currency in use in the country
     */
    #[Groups("countries:read")]
    #[ORM\Column(length: 255)]
    private ?string $currency = null;

    /**
     * Emoji representation of the flag
     */
    #[Groups("countries:read")]
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