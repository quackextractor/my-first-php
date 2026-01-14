<?php

namespace App\Entity;

use App\Repository\PobockaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PobockaRepository::class)]
class Pobocka
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_pobocka = null;

    #[ORM\OneToMany(mappedBy: 'pobocka', targetEntity: Zamestnanec::class)]
    private Collection $zamestnanci;

    public function __construct()
    {
        $this->zamestnanci = new ArrayCollection();
    }

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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jmeno_vedouciho = null;

    public function getJmenoVedouciho(): ?string
    {
        return $this->jmeno_vedouciho;
    }

    public function setJmenoVedouciho(?string $jmeno_vedouciho): static
    {
        $this->jmeno_vedouciho = $jmeno_vedouciho;

        return $this;
    }

    /**
     * @return Collection<int, Zamestnanec>
     */
    public function getZamestnanci(): Collection
    {
        return $this->zamestnanci;
    }

    public function addZamestnanec(Zamestnanec $zamestnanec): static
    {
        if (!$this->zamestnanci->contains($zamestnanec)) {
            $this->zamestnanci->add($zamestnanec);
            $zamestnanec->setPobocka($this);
        }

        return $this;
    }

    public function removeZamestnanec(Zamestnanec $zamestnanec): static
    {
        if ($this->zamestnanci->removeElement($zamestnanec)) {
            // set the owning side to null (unless already changed)
            if ($zamestnanec->getPobocka() === $this) {
                $zamestnanec->setPobocka(null);
            }
        }

        return $this;
    }
}
