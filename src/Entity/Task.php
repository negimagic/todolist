<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=projet::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_projet;

    /**
     * @ORM\ManyToOne(targetEntity=user::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $end_at;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="id_task")
     */
    private $id_tag;

    public function __construct()
    {
        $this->id_tag = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProjet(): ?projet
    {
        return $this->id_projet;
    }

    public function setIdProjet(?projet $id_projet): self
    {
        $this->id_projet = $id_projet;

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->id_user;
    }

    public function setIdUser(?user $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->start_at;
    }

    public function setStartAt(\DateTimeInterface $start_at): self
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->end_at;
    }

    public function setEndAt(?\DateTimeInterface $end_at): self
    {
        $this->end_at = $end_at;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getIdTag(): Collection
    {
        return $this->id_tag;
    }

    public function addIdTag(Tag $idTag): self
    {
        if (!$this->id_tag->contains($idTag)) {
            $this->id_tag[] = $idTag;
            $idTag->addIdTask($this);
        }

        return $this;
    }

    public function removeIdTag(Tag $idTag): self
    {
        if ($this->id_tag->removeElement($idTag)) {
            $idTag->removeIdTask($this);
        }

        return $this;
    }
}
