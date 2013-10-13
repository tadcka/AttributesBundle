<?php

/*
 * This file is part of the Tadcka attribute package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tadcka\AttributesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Tadcka\AttributesBundle\Entity\Repository\AttributesGroupRepository")
 * @ORM\Table(name="tadcka_attributes_group")
 */
class AttributesGroup
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime $createAt
     *
     * @ORM\Column(name="create_at", type="datetime", nullable=false)
     */
    private $createAt;

    /**
     * @var \DateTime $updateAt
     *
     * @ORM\Column(name="update_at", type="datetime", nullable=false)
     */
    private $updateAt;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false, unique=true)
     */
    private $slug;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|\Tadcka\AttributesBundle\Entity\AttributesGroupTranslation[]
     *
     * @ORM\OneToMany(targetEntity="\Tadcka\AttributesBundle\Entity\AttributesGroupTranslation", mappedBy="entity", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     *  @var \Doctrine\Common\Collections\ArrayCollection|\Tadcka\AttributesBundle\Entity\Attribute[]
     *
     * @ORM\ManyToMany(targetEntity="\Tadcka\AttributesBundle\Entity\Attribute")
     * @ORM\JoinTable(name="tadcka_attributes_group_attribute",
     *      joinColumns={@ORM\JoinColumn(name="attributes_group_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="attribute_id", referencedColumnName="id")}
     * )
     */
    protected $attributes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->attributes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createAt = new \DateTime();
        $this->updateAt = $this->createAt;
    }
    
    /**
     * Get id.
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createAt.
     *
     * @param \DateTime $createAt
     *
     * @return AttributesGroup
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    
        return $this;
    }

    /**
     * Get createAt.
     *
     * @return \DateTime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updateAt.
     *
     * @return AttributesGroup
     */
    public function setUpdateAt()
    {
        if ($this->updateAt instanceof \DateTime) {
            $this->updateAt->modify('now');
        } else {
            $this->updateAt = new \DateTime();
        }

        return $this;
    }

    /**
     * Get updateAt.
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return AttributesGroup
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug.
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add translations.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributesGroupTranslation $translations
     *
     * @return AttributesGroup
     */
    public function addTranslation(\Tadcka\AttributesBundle\Entity\AttributesGroupTranslation $translations)
    {
        $this->translations[] = $translations;
    
        return $this;
    }

    /**
     * Remove translations.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributesGroupTranslation $translations
     */
    public function removeTranslation(\Tadcka\AttributesBundle\Entity\AttributesGroupTranslation $translations)
    {
        $this->translations->removeElement($translations);
    }

    /**
     * Get translations.
     *
     * @return \Doctrine\Common\Collections\Collection|\Tadcka\AttributesBundle\Entity\AttributesGroupTranslation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Add attributes.
     *
     * @param \Tadcka\AttributesBundle\Entity\Attribute $attributes
     *
     * @return AttributesGroup
     */
    public function addAttribute(\Tadcka\AttributesBundle\Entity\Attribute $attributes)
    {
        $this->attributes[] = $attributes;
    
        return $this;
    }

    /**
     * Remove attributes.
     *
     * @param \Tadcka\AttributesBundle\Entity\Attribute $attributes
     */
    public function removeAttribute(\Tadcka\AttributesBundle\Entity\Attribute $attributes)
    {
        $this->attributes->removeElement($attributes);
    }

    /**
     * Get attributes.
     *
     * @return \Doctrine\Common\Collections\Collection|\Tadcka\AttributesBundle\Entity\Attribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
