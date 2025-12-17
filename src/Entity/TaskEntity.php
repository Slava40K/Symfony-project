<?php

namespace App\Entity;

use App\Repository\TaskEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskEntityRepository::class)]
class TaskEntity
{   // ATTRIBUTES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $DueDate = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Completed = null;

    // GETTERS AND SETTERS
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function isCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(bool $completed): static
    {
        $this->completed = $completed;

        return $this;
    }

    public function getDueDate(): ?\DateTime
    {
        return $this->DueDate;
    }

    public function setDueDate(\DateTime $DueDate): static
    {
        $this->DueDate = $DueDate;

        return $this;
    }
}
