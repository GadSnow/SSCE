<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionRepository::class)]
class Position
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\ManyToOne(inversedBy: 'positions')]
    private ?Student $studentId = null;

    #[ORM\ManyToOne(inversedBy: 'positions')]
    private ?Entreprise $entrepriseId = null;

    #[ORM\Column(length: 255)]
    private ?string $situation = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getStudentId(): ?Student
    {
        return $this->studentId;
    }

    public function setStudentId(?Student $studentId): self
    {
        $this->studentId = $studentId;

        return $this;
    }

    public function getEntrepriseId(): ?Entreprise
    {
        return $this->entrepriseId;
    }

    public function setEntrepriseId(?Entreprise $entrepriseId): self
    {
        $this->entrepriseId = $entrepriseId;

        return $this;
    }

    public function getSituation(): ?string
    {
        return $this->situation;
    }

    public function setSituation(string $situation): self
    {
        $this->situation = $situation;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
