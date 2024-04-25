<?php

namespace App\Entity;

use App\Repository\MatiéreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatiéreRepository::class)]
class Matiére
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_M = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $intitulé = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdM(): ?int
    {
        return $this->id_M;
    }

    public function setIdM(int $id_M): static
    {
        $this->id_M = $id_M;

        return $this;
    }

    public function getIntitulé(): ?string
    {
        return $this->intitulé;
    }

    public function setIntitulé(?string $intitulé): static
    {
        $this->intitulé = $intitulé;

        return $this;
    }
}
