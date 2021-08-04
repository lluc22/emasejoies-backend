<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Base class
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks()
 */
abstract class Base
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected ?int $id = null;

    /**
     * @ORM\Column(name="enabled", type="boolean", nullable=false, options={"default":true})
     */
    protected bool $enabled = true;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    protected ?\DateTimeInterface $createdAt = null;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected ?\DateTimeInterface $updatedAt = null;


    private ?DateTime $now = null;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled enabled
     *
     * @return $this
     */
    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * Set createdAt
     *
     * @param \DateTimeInteface $createdAt
     *
     * @return $this
     * @throws \Exception
     */
    public function setCreatedAt(\DateTimeInterface $createdAt=null): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTimeInteface
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTimeInterface $updatedAt
     *
     * @return $this
     * @throws \Exception
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt = null): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTimeInterface
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param int $id
     * @return Base
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }



     /**
     * @ORM\PreUpdate
     * @ORM\PrePersist
     * @throws \Exception
     */
    public function updatedAt(){
        $this->setUpdatedAt(new DateTime());
    }

    /**
     * @ORM\PrePersist
     * @throws \Exception
     */
    public function createdAt(){
        $this->setCreatedAt(new DateTime());
    }

}
