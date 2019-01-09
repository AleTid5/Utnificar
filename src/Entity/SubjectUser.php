<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubjectUserRepository")
 */
class SubjectUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="subjectUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Subject")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subject;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $approved;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registerDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSubject(): ?subject
    {
        return $this->subject;
    }

    public function setSubject(?subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getApproved(): ?string
    {
        return $this->approved;
    }

    public function setApproved(string $approved): self
    {
        $this->approved = $approved;

        return $this;
    }

    public function getRegisterDate(): ?\DateTimeInterface
    {
        return $this->registerDate;
    }

    public function setRegisterDate(\DateTimeInterface $registerDate): self
    {
        $this->registerDate = $registerDate;

        return $this;
    }
}
