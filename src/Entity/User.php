<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="Ya existe una cuenta con ese E-Mail")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $login_times;

    /**
     * @ORM\Column(type="datetime")
     */
    private $born_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $register_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $last_login_date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubjectUser", mappedBy="user")
     */
    private $subjectUsers;

    public function __construct()
    {
        $this->subjectUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles[] = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLoginTimes(): ?int
    {
        return $this->login_times;
    }

    public function setLoginTimes(int $login_times): self
    {
        $this->login_times = $login_times;

        return $this;
    }

    public function getBornDate(): ?\DateTimeInterface
    {
        return $this->born_date;
    }

    public function setBornDate(\DateTimeInterface $born_date): self
    {
        $this->born_date = $born_date;

        return $this;
    }

    public function getRegisterDate(): ?\DateTimeInterface
    {
        return $this->register_date;
    }

    public function setRegisterDate(\DateTimeInterface $register_date): self
    {
        $this->register_date = $register_date;

        return $this;
    }

    public function getLastLoginDate(): ?\DateTimeInterface
    {
        return $this->last_login_date;
    }

    public function setLastLoginDate(\DateTimeInterface $last_login_date): self
    {
        $this->last_login_date = $last_login_date;

        return $this;
    }

    /**
     * @return Collection|SubjectUser[]
     */
    public function getSubjectUsers(): Collection
    {
        return $this->subjectUsers;
    }

    public function addSubjectUser(SubjectUser $subjectUser): self
    {
        if (!$this->subjectUsers->contains($subjectUser)) {
            $this->subjectUsers[] = $subjectUser;
            $subjectUser->setUser($this);
        }

        return $this;
    }

    public function removeSubjectUser(SubjectUser $subjectUser): self
    {
        if ($this->subjectUsers->contains($subjectUser)) {
            $this->subjectUsers->removeElement($subjectUser);
            // set the owning side to null (unless already changed)
            if ($subjectUser->getUser() === $this) {
                $subjectUser->setUser(null);
            }
        }

        return $this;
    }
}
