<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DriverRepository::class)
 */
class Driver
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom est obligatoire")
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     minMessage="Le nom est trop court",
     *     maxMessage="Le nom est trop long"
     * )
     */
    private $lastname;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le prénom est obligatoire")
     */
    private $firstname;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank(message="L'age est obligatoire")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="L'email est obligatoire")
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity=Cars::class, inversedBy="driver", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $car;

    public function getId(): ?int
    {
        return $this->id;
    }

        public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }


    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCar(): ?Cars
    {
        return $this->car;
    }

    public function setCar(?Cars $car): self
    {
        if ($this->car !== null) {
            $this->car->setDriver(null);
        }

        $this->car = $car;

        if ($car !== null) {
            $car->setDriver($this);
        }

        return $this;
    }



    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }
}
