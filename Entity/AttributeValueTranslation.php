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
 * @ORM\Table(name="tadcka_attribute_value_translation")
 */
class AttributeValueTranslation
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
     * @var \Tadcka\AttributesBundle\Entity\AttributeValue $entity
     *
     * @ORM\ManyToOne(targetEntity="\Tadcka\AttributesBundle\Entity\AttributeValue", inversedBy="translations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_value_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * })
     */
    private $entity;

    /**
     * @var string $lang
     *
     * @ORM\Column(name="lang", type="string", length=31, nullable=true)
     */
    private $lang;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string $shortName
     *
     * @ORM\Column(name="short_name", type="string", length=255, nullable=true)
     */
    private $shortName;

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
     * Set lang.
     *
     * @param string $lang
     *
     * @return AttributeValueTranslation
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    
        return $this;
    }

    /**
     * Get lang.
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return AttributeValueTranslation
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name.
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set shortName.
     *
     * @param string $shortName
     *
     * @return AttributeValueTranslation
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    
        return $this;
    }

    /**
     * Get shortName.
     *
     * @return string 
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set entity.
     *
     * @param \Tadcka\AttributesBundle\Entity\AttributeValue $entity
     *
     * @return AttributeValueTranslation
     */
    public function setEntity(\Tadcka\AttributesBundle\Entity\AttributeValue $entity)
    {
        $this->entity = $entity;
    
        return $this;
    }

    /**
     * Get entity
     *
     * @return \Tadcka\AttributesBundle\Entity\AttributeValue 
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
