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
 * @ORM\Entity(repositoryClass="Tadcka\AttributesBundle\Entity\Repository\AttributeRepository")
 * @ORM\Table(name="tadcka_attribute")
 */
class Attribute
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
     * @var integer $sort
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false, unique=true)
     */
    private $slug;

    /**
     * @var boolean $isTranslatable
     *
     * @ORM\Column(name="is_translatable", type="boolean", nullable=false)
     */
    private $isTranslatable = false;

    /**
     * @var boolean $isValueTranslatable
     *
     * @ORM\Column(name="is_value_translatable", type="boolean", nullable=false)
     */
    private $isValueTranslatable = false;

    /**
     * @var boolean $isMultiplied
     *
     * @ORM\Column(name="is_multiple", type="boolean", nullable=false)
     */
    private $isMultiple = false;

    /**
     * @var boolean $visible
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|\Tadcka\AttributesBundle\Entity\AttributeTranslation[]
     *
     * @ORM\OneToMany(targetEntity="\Tadcka\AttributesBundle\Entity\AttributeTranslation", mappedBy="entity", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|\Tadcka\AttributesBundle\Entity\AttributeValue[]
     *
     * @ORM\OneToMany(targetEntity="\Tadcka\AttributesBundle\Entity\AttributeValue", mappedBy="attribute", cascade={"persist", "remove"})
     */
    private $values;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->values = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Attribute
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
     * Set sort.
     *
     * @param integer $sort
     *
     * @return Attribute
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    
        return $this;
    }

    /**
     * Get sort.
     *
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set slug.
     *
     * @param string $slug
     *
     * @return Attribute
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
     * Set isTranslatable.
     *
     * @param boolean $isTranslatable
     *
     * @return Attribute
     */
    public function setIsTranslatable($isTranslatable)
    {
        $this->isTranslatable = $isTranslatable;
    
        return $this;
    }

    /**
     * Get isTranslatable.
     *
     * @return boolean 
     */
    public function getIsTranslatedValue()
    {
        return $this->isTranslatable;
    }

    /**
     * Set isValueTranslatable.
     *
     * @param boolean $isValueTranslatable
     *
     * @return Attribute
     */
    public function setIsValueTranslatable($isValueTranslatable)
    {
        $this->isValueTranslatable = $isValueTranslatable;

        return $this;
    }

    /**
     * Get isValueTranslatable.
     *
     * @return boolean
     */
    public function getIsValueTranslatable()
    {
        return $this->isValueTranslatable;
    }

    /**
     * Set isMultiple.
     *
     * @param boolean $isMultiple
     *
     * @return Attribute
     */
    public function setIsMultiple($isMultiple)
    {
        $this->isMultiple = $isMultiple;
    
        return $this;
    }

    /**
     * Get isMultiple.
     *
     * @return boolean 
     */
    public function getIsMultiple()
    {
        return $this->isMultiple;
    }

    /**
     * Set visible.
     *
     * @param boolean $visible
     *
     * @return Attribute
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    
        return $this;
    }

    /**
     * Get visible.
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Add translation.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributeTranslation $translations
     *
     * @return Attribute
     */
    public function addTranslation(\Tadcka\AttributesBundle\Entity\AttributeTranslation $translations)
    {
        $this->translations[] = $translations;
    
        return $this;
    }

    /**
     * Remove translations.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributeTranslation $translations
     */
    public function removeTranslation(\Tadcka\AttributesBundle\Entity\AttributeTranslation $translations)
    {
        $this->translations->removeElement($translations);
    }

    /**
     * Get translations.
     *
     * @return \Doctrine\Common\Collections\Collection|\Tadcka\AttributesBundle\Entity\AttributeTranslation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Add value.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributeValue $value
     *
     * @return Attribute
     */
    public function addValue(\Tadcka\AttributesBundle\Entity\AttributeValue $value)
    {
        $this->values[] = $value;

        return $this;
    }

    /**
     * Remove value.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributeValue $value
     */
    public function removeValue(\Tadcka\AttributesBundle\Entity\AttributeValue $value)
    {
        $this->values->removeElement($value);
    }

    /**
     * Get values.
     *
     * @return \Doctrine\Common\Collections\Collection|\Tadcka\AttributesBundle\Entity\AttributeValue[]
     */
    public function getValues()
    {
        return $this->values;
    }
}
