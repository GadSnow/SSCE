<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[UniqueEntity('matricule', message: 'Cette valeur doit être unique.')]
#[Vich\Uploadable]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $matricule = null;

    #[ORM\Column(length: 255)]
    private ?string $fullname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255)]
    private ?string $birthplace = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Email(message: 'Addresse email non valide.')]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'studentId')]
    private ?Speciality $speciality = null;

    #[ORM\OneToMany(mappedBy: 'studentId', targetEntity: CourseOfLife::class)]
    private Collection $courseOfLives;

    #[ORM\OneToMany(mappedBy: 'studentId', targetEntity: Position::class)]
    private Collection $positions;

    #[ORM\Column]
    private ?DateTimeImmutable $created_at = null;

    private ?string $lastSpeciality = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $filename = null;


    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    #[Vich\UploadableField(mapping: 'student_image', fileNameProperty: 'filename')]
    #[Assert\Image(mimeTypes: ['image/jpeg'])]
    private ?File $imageFile = null;

    #[ORM\ManyToMany(targetEntity: Skill::class, inversedBy: 'students')]
    private Collection $skill;

    public function __construct()
    {
        $this->courseOfLives = new ArrayCollection();
        $this->positions = new ArrayCollection();
        $this->created_at = new DateTimeImmutable();
        $this->skill = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getBirthplace(): ?string
    {
        return $this->birthplace;
    }

    public function setBirthplace(string $birthplace): self
    {
        $this->birthplace = $birthplace;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?Speciality $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * @return Collection<int, CourseOfLife>
     */
    public function getCourseOfLives(): Collection
    {
        return $this->courseOfLives;
    }

    public function addCourseOfLife(CourseOfLife $courseOfLife): self
    {
        if (!$this->courseOfLives->contains($courseOfLife)) {
            $this->courseOfLives->add($courseOfLife);
            $courseOfLife->setStudentId($this);
        }

        return $this;
    }

    public function removeCourseOfLife(CourseOfLife $courseOfLife): self
    {
        if ($this->courseOfLives->removeElement($courseOfLife)) {
            // set the owning side to null (unless already changed)
            if ($courseOfLife->getStudentId() === $this) {
                $courseOfLife->setStudentId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Position>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function addPosition(Position $position): self
    {
        if (!$this->positions->contains($position)) {
            $this->positions->add($position);
            $position->setStudentId($this);
        }

        return $this;
    }

    public function removePosition(Position $position): self
    {
        if ($this->positions->removeElement($position)) {
            // set the owning side to null (unless already changed)
            if ($position->getStudentId() === $this) {
                $position->setStudentId(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return 
     */
    public function getLastSpeciality(): ?string
    {
        $this->lastSpeciality = $this->getSpeciality()->getLabel();
        return $this->lastSpeciality;
    }

    /**
     * @param  $lastSpeciality 
     * @return self
     */
    public function setLastSpeciality(?string $lastSpeciality): self
    {
        $this->lastSpeciality = $lastSpeciality;
        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * @return 
     */
    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * @param  $updatedAt 
     * @return self
     */
    public function setUpdatedAt(?DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return 
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param  $imageFile 
     * @return self
     */
    public function setImageFile(?File $imageFile): self
    {
        $this->imageFile = $imageFile;

        if ($this->imageFile instanceof UploadedFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkill(): Collection
    {
        return $this->skill;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skill->contains($skill)) {
            $this->skill->add($skill);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        $this->skill->removeElement($skill);

        return $this;
    }
}
