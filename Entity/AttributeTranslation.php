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
 * @ORM\Entity
 * @ORM\Table(name="tadcka_attribute_translation")
 */
class AttributeTranslation
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
     * @var \Tadcka\AttributesBundle\Entity\Attribute $entity
     *
     * @ORM\ManyToOne(targetEntity="\Tadcka\AttributesBundle\Entity\Attribute", inversedBy="translations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribute_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

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
     * @return AttributeTranslation
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
     * Set title.
     *
     * @param string $title
     *
     * @return AttributeTranslation
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title.
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set entity.
     *
     * @param \Tadcka\AttributesBundle\Entity\Attribute $entity
     *
     * @return AttributeTranslation
     */
    public function setEntity(\Tadcka\AttributesBundle\Entity\Attribute $entity)
    {
        $this->entity = $entity;
    
        return $this;
    }

    /**
     * Get entity.
     *
     * @return \Tadcka\AttributesBundle\Entity\Attribute 
     */
    public function getEntity()
    {
        return $this->entity;
    }
}

