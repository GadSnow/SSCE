<?php


namespace App\Entity;

use App\Repository\EntrepriseRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
#[Vich\Uploadable]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /**
     * Summary of id
     * @var int
     */
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    /**
     * Summary of designation
     * @var string
     */
    private ?string $designation = null;

    #[ORM\Column(length: 255)]
    /**
     * Summary of adress
     * @var string
     */
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    /**
     * Summary of contact
     * @var string
     */
    private ?string $contact = null;

    #[ORM\Column(length: 255)]
    /**
     * Summary of email
     * @var string
     */
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    /**
     * Summary of latitude
     * @var string
     */
    private ?string $latitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    /**
     * Summary of longitude
     * @var string
     */
    private ?string $longitude = null;

    #[ORM\Column(length: 255, type: Types::TEXT)]
    /**
     * Summary of description
     * @var string
     */
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'entrepriseId', targetEntity: Position::class)]
    /**
     * Summary of positions
     * @var Collection
     */
    private Collection $positions;

    #[ORM\Column]
    private ?bool $partener = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(nullable: true)]
    private ?DateTimeImmutable $updatedAt = null;

    #[Vich\UploadableField(mapping: 'entreprise_image', fileNameProperty: 'logo')]
    private ?File $imageFile = null;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->positions = new ArrayCollection();
    }

    /**
     * Summary of getId
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Summary of getDesignation
     * @return string|null
     */
    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    /**
     * Summary of setDesignation
     * @param mixed $designation
     * @return \App\Entity\Entreprise
     */
    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Summary of getAdress
     * @return string|null
     */
    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * Summary of setAdress
     * @param mixed $adress
     * @return \App\Entity\Entreprise
     */
    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Summary of getContact
     * @return string|null
     */
    public function getContact(): ?string
    {
        return $this->contact;
    }

    /**
     * Summary of setContact
     * @param mixed $contact
     * @return \App\Entity\Entreprise
     */
    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Summary of getEmail
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Summary of setEmail
     * @param mixed $email
     * @return \App\Entity\Entreprise
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Summary of getLatitude
     * @return string|null
     */
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    /**
     * Summary of setLatitude
     * @param mixed $latitude
     * @return \App\Entity\Entreprise
     */
    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Summary of getLongitude
     * @return string|null
     */
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    /**
     * Summary of setLongitude
     * @param mixed $longitude
     * @return \App\Entity\Entreprise
     */
    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Summary of getDescription
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Summary of setDescription
     * @param mixed $description
     * @return \App\Entity\Entreprise
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Position>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    /**
     * Summary of addPosition
     * @param \App\Entity\Position $position
     * @return \App\Entity\Entreprise
     */
    public function addPosition(Position $position): self
    {
        if (!$this->positions->contains($position)) {
            $this->positions->add($position);
            $position->setEntrepriseId($this);
        }

        return $this;
    }

    /**
     * Summary of removePosition
     * @param \App\Entity\Position $position
     * @return \App\Entity\Entreprise
     */
    public function removePosition(Position $position): self
    {
        if ($this->positions->removeElement($position)) {
            // set the owning side to null (unless already changed)
            if ($position->getEntrepriseId() === $this) {
                $position->setEntrepriseId(null);
            }
        }

        return $this;
    }

    public function isPartener(): ?bool
    {
        return $this->partener;
    }

    public function setPartener(bool $partener): self
    {
        $this->partener = $partener;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

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
