<?php

namespace App\Entity;

use App\Repository\PobockaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PobockaRepository::class)]
class Pobocka
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_pobocka = null;

    #[ORM\Column(length: 255)]
    private ?string $cislo_popisne = null;

    #[ORM\Column(length: 255)]
    private ?string $ulice = null;

    #[ORM\Column(length: 255)]
    private ?string $mesto = null;

    #[ORM\Column(length: 255)]
    private ?string $kod_zeme = null;

    public function getIdPobocka(): ?int
    {
        return $this->id_pobocka;
    }

    public function getCisloPopisne(): ?string
    {
        return $this->cislo_popisne;
    }

    public function setCisloPopisne(string $cislo_popisne): static
    {
        $this->cislo_popisne = $cislo_popisne;

        return $this;
    }

    public function getUlice(): ?string
    {
        return $this->ulice;
    }

    public function setUlice(string $ulice): static
    {
        $this->ulice = $ulice;

        return $this;
    }

    public function getMesto(): ?string
    {
        return $this->mesto;
    }

    public function setMesto(string $mesto): static
    {
        $this->mesto = $mesto;

        return $this;
    }

    public function getKodZeme(): ?string
    {
        return $this->kod_zeme;
    }

    public function setKodZeme(string $kod_zeme): static
    {
        $this->kod_zeme = $kod_zeme;

        return $this;
    }
}
