<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialityRepository::class)]
class Speciality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'speciality', targetEntity: Student::class)]
    private Collection $studentId;

    public function __construct()
    {
        $this->studentId = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudentId(): Collection
    {
        return $this->studentId;
    }

    public function addStudentId(Student $studentId): self
    {
        if (!$this->studentId->contains($studentId)) {
            $this->studentId->add($studentId);
            $studentId->setSpeciality($this);
        }

        return $this;
    }

    public function removeStudentId(Student $studentId): self
    {
        if ($this->studentId->removeElement($studentId)) {
            // set the owning side to null (unless already changed)
            if ($studentId->getSpeciality() === $this) {
                $studentId->setSpeciality(null);
            }
        }

        return $this;
    }
}
