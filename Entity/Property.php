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
 * @ORM\Entity(repositoryClass="Tadcka\AttributesBundle\Entity\Repository\PropertyRepository")
 * @ORM\Table(name="tadcka_property", uniqueConstraints={@ORM\UniqueConstraint(name="object_idx", columns={"object_id", "object_type"})})
 */
class Property
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
     * @var integer $sort
     *
     * @ORM\Column(name="sort", type="integer", nullable=false)
     */
    private $sort;

    /**
     * @var string $objectId
     *
     * @ORM\Column(name="object_id", type="integer", nullable=false)
     */
    private $objectId;

    /**
     * @var string $objectType
     *
     * @ORM\Column(name="object_type", type="string", length=255, nullable=false)
     */
    private $objectType;

    /**
     * @var boolean $visible
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible;

    /**
     * @var \Tadcka\AttributesBundle\Entity\PropertyValue $value
     *
     * @ORM\OneToOne(targetEntity="\Tadcka\AttributesBundle\Entity\PropertyValue", mappedBy="property")
     */
    private $value;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|\Tadcka\AttributesBundle\Entity\PropertyTranslation[]
     *
     * @ORM\OneToMany(targetEntity="\Tadcka\AttributesBundle\Entity\PropertyTranslation", mappedBy="entity", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createAt = new \DateTime();
        $this->updateAt = $this->createAt;
    }
    
    /**
     * Get id
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
     * Set updateAt
     *
     * @return Property
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
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set isTranslatable.
     *
     * @param boolean $isTranslatable
     *
     * @return Property
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
    public function getIsTranslatable()
    {
        return $this->isTranslatable;
    }

    /**
     * Set isValueTranslatable.
     *
     * @param boolean $isValueTranslatable
     *
     * @return Property
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
     * Set sort.
     *
     * @param integer $sort
     *
     * @return Property
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
     * Set objectId.
     *
     * @param integer $objectId
     *
     * @return Property
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    
        return $this;
    }

    /**
     * Get objectId.
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set objectType.
     *
     * @param string $objectType
     *
     * @return Property
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
    
        return $this;
    }

    /**
     * Get objectType.
     *
     * @return string 
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * Set visible.
     *
     * @param boolean $visible
     *
     * @return Property
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
     * Set value.
     *
     * @param \Tadcka\AttributesBundle\Entity\PropertyValue $value
     *
     * @return Property
     */
    public function setValue(\Tadcka\AttributesBundle\Entity\PropertyValue $value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value.
     *
     * @return \Tadcka\AttributesBundle\Entity\PropertyValue 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Add translation.
     *
     * @param \Tadcka\AttributesBundle\Entity\PropertyTranslation $translations
     *
     * @return Property
     */
    public function addTranslation(\Tadcka\AttributesBundle\Entity\PropertyTranslation $translations)
    {
        $this->translations[] = $translations;
    
        return $this;
    }

    /**
     * Remove translation.
     *
     * @param \Tadcka\AttributesBundle\Entity\PropertyTranslation $translations
     */
    public function removeTranslation(\Tadcka\AttributesBundle\Entity\PropertyTranslation $translations)
    {
        $this->translations->removeElement($translations);
    }

    /**
     * Get translations.
     *
     * @return \Doctrine\Common\Collections\Collection|\Tadcka\AttributesBundle\Entity\PropertyTranslation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}
