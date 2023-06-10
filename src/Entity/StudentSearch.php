<?php

namespace App\Entity;

class StudentSearch
{
    /**
     * 
     * @var string $matricule
     */
    private ?string $matricule = null;

    /**
     * @return  string
     */
    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    /**
     * @param  $matricule 
     * @return self
     */
    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;
        return $this;
    }
}
