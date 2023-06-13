<?php

namespace App\Entity;

use App\Repository\CourseOfLifeRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Mime\MimeTypes;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CourseOfLifeRepository::class)]
#[Vich\Uploadable]
class CourseOfLife
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'courseOfLives')]
    /**
     * Summary of studentId
     * @var 
     */
    private ?Student $studentId = null;

    #[ORM\Column(nullable: true)]
    /**
     * Summary of file
     * @var 
     */
    private ?string $file = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    #[Vich\UploadableField(mapping: 'student_cv', fileNameProperty: 'file')]
    #[Assert\File(mimeTypes: ['application/pdf'])]
    private ?File $imageFile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Summary of studentId
     * @return 
     */
    public function getStudentId(): ?Student
    {
        return $this->studentId;
    }

    /**
     * Summary of studentId
     * @param  $studentId Summary of studentId
     * @return self
     */
    public function setStudentId(?Student $studentId): self
    {
        $this->studentId = $studentId;
        return $this;
    }

    /**
     * Summary of file
     * @return 
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * Summary of file
     * @param  $file Summary of file
     * @return self
     */
    public function setFile(?string $file): self
    {
        $this->file = $file;
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
}
