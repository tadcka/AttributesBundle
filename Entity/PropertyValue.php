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
 * @ORM\Entity(repositoryClass="Tadcka\AttributesBundle\Entity\Repository\PropertyValueRepository")
 * @ORM\Table(name="tadcka_property_value")
 */
class PropertyValue
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
     * @var boolean $visible
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible;

    /**
     * @var \Tadcka\AttributesBundle\Entity\Property $property
     *
     * @ORM\OneToOne(targetEntity="\Tadcka\AttributesBundle\Entity\Property", inversedBy="value")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="id", nullable=false)
     */
    private $property;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|\Tadcka\AttributesBundle\Entity\PropertyValueTranslation[]
     *
     * @ORM\OneToMany(targetEntity="\Tadcka\AttributesBundle\Entity\PropertyValueTranslation", mappedBy="entity", cascade={"persist", "remove"})
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
     * @return PropertyValue
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
     * Set visible.
     *
     * @param boolean $visible
     *
     * @return PropertyValue
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
     * Set property.
     *
     * @param \Tadcka\AttributesBundle\Entity\Property $property
     *
     * @return PropertyValue
     */
    public function setProperty(\Tadcka\AttributesBundle\Entity\Property $property = null)
    {
        $this->property = $property;
    
        return $this;
    }

    /**
     * Get property.
     *
     * @return \Tadcka\AttributesBundle\Entity\Property 
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Add translation.
     *
     * @param \Tadcka\AttributesBundle\Entity\PropertyValueTranslation $translations
     *
     * @return PropertyValue
     */
    public function addTranslation(\Tadcka\AttributesBundle\Entity\PropertyValueTranslation $translations)
    {
        $this->translations[] = $translations;
    
        return $this;
    }

    /**
     * Remove translation.
     *
     * @param \Tadcka\AttributesBundle\Entity\PropertyValueTranslation $translations
     */
    public function removeTranslation(\Tadcka\AttributesBundle\Entity\PropertyValueTranslation $translations)
    {
        $this->translations->removeElement($translations);
    }

    /**
     * Get translations.
     *
     * @return \Doctrine\Common\Collections\Collection|\Tadcka\AttributesBundle\Entity\PropertyValueTranslation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}
