<?php

namespace App\Entity;

use App\Repository\ZamestnanecRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZamestnanecRepository::class)]
class Zamestnanec
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jmeno = null;

    #[ORM\Column(length: 255)]
    private ?string $prijmeni = null;

    #[ORM\ManyToOne(targetEntity: Pobocka::class, inversedBy: 'zamestnanci')]
    #[ORM\JoinColumn(referencedColumnName: 'id_pobocka', nullable: false)]
    private ?Pobocka $pobocka = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJmeno(): ?string
    {
        return $this->jmeno;
    }

    public function setJmeno(string $jmeno): static
    {
        $this->jmeno = $jmeno;

        return $this;
    }

    public function getPrijmeni(): ?string
    {
        return $this->prijmeni;
    }

    public function setPrijmeni(string $prijmeni): static
    {
        $this->prijmeni = $prijmeni;

        return $this;
    }

    public function getPobocka(): ?Pobocka
    {
        return $this->pobocka;
    }

    public function setPobocka(?Pobocka $pobocka): static
    {
        $this->pobocka = $pobocka;

        return $this;
    }
}
