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
 * @ORM\Entity(repositoryClass="Tadcka\AttributesBundle\Entity\Repository\AttributeValueRepository")
 * @ORM\Table(name="tadcka_attribute_value")
 */
class AttributeValue
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
     * @var boolean $visible
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    private $visible;

    /**
     * @var \Tadcka\AttributesBundle\Entity\Attribute $attribute
     *
     * @ORM\ManyToOne(targetEntity="\Tadcka\AttributesBundle\Entity\Attribute", inversedBy="values")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * })
     */
    private $attribute;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|\Tadcka\AttributesBundle\Entity\AttributeValueTranslation[]
     *
     * @ORM\OneToMany(targetEntity="\Tadcka\AttributesBundle\Entity\AttributeValueTranslation", mappedBy="entity", cascade={"persist", "remove"})
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
     * Set updateAt.
     *
     * @return AttributeValue
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
     * @return AttributeValue
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
     * Set visible.
     *
     * @param boolean $visible
     *
     * @return AttributeValue
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
     * Set attribute.
     *
     * @param \Tadcka\AttributesBundle\Entity\Attribute $attribute
     *
     * @return AttributeValue
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Get attribute.
     *
     * @return \Tadcka\AttributesBundle\Entity\Attribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Add translation.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributeValueTranslation $translations
     *
     * @return AttributeValue
     */
    public function addTranslation(\Tadcka\AttributesBundle\Entity\AttributeValueTranslation $translations)
    {
        $this->translations[] = $translations;
    
        return $this;
    }

    /**
     * Remove translation.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributeValueTranslation $translations
     */
    public function removeTranslation(\Tadcka\AttributesBundle\Entity\AttributeValueTranslation $translations)
    {
        $this->translations->removeElement($translations);
    }

    /**
     * Get translations.
     *
     * @return \Doctrine\Common\Collections\Collection|\Tadcka\AttributesBundle\Entity\AttributeValueTranslation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}
