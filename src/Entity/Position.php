<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: PositionRepository::class)]
#[Broadcast]

class Position
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $Ordre = null;



    #[ORM\ManyToOne(inversedBy: 'position')]
    private ?Internaute $internaute = null;

    #[ORM\ManyToOne(inversedBy: 'position')]
    private ?Bloc $blocPosition = null; // Attention: relation Internaute-position-bloc fausse dans le schéma de BD ! La relation correcte est Internaute -1----*-Position-*-----1-Bloc

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdre(): ?int
    {
        return $this->Ordre;
    }

    public function setOrdre(?int $Ordre): static
    {
        $this->Ordre = $Ordre;

        return $this;
    }





    public function getInternaute(): ?Internaute
    {
        return $this->internaute;
    }

    public function setInternaute(?Internaute $internaute): static
    {
        $this->internaute = $internaute;

        return $this;
    }

    public function getBlocPosition(): ?Bloc
    {
        return $this->blocPosition;
    }

    public function setBlocPosition(?Bloc $blocPosition): static
    {
        $this->blocPosition = $blocPosition;

        return $this;
    }
}
