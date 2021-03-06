<?php

namespace comercial\ComercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoOperacion
 *
 * @ORM\Table(name="tipo_operacion")
 * @ORM\Entity(repositoryClass="comercial\ComercialBundle\Repository\TipoOperacionRepository")
 */
class TipoOperacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="descuento", type="decimal",precision=10, scale=2, nullable=true)
     */
    private $descuento;

    /**
     * @var \stdClass
     *
     * @ORM\OneToMany(targetEntity="comercial\ComercialBundle\Entity\Operacion", mappedBy="tipoOperacion")
     */
    private $operaciones;

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
     * Set descripcion
     *
     * @param string $descripcion
     * @return TipoOperacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set descuento
     *
     * @param string $descuento
     * @return TipoOperacion
     */
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

        return $this;
    }

    /**
     * Get descuento
     *
     * @return string 
     */
    public function getDescuento()
    {
        return $this->descuento;
    }

    /**
     * Add operaciones
     *
     * @param \comercial\ComercialBundle\Entity\Operacion $operaciones
     * @return TipoOperacion
     */
    public function addOperacione(\comercial\ComercialBundle\Entity\Operacion $operaciones)
    {
        $this->operaciones[] = $operaciones;

        return $this;
    }

    /**
     * Remove operaciones
     *
     * @param \comercial\ComercialBundle\Entity\Operacion $operaciones
     */
    public function removeOperacione(\comercial\ComercialBundle\Entity\Operacion $operaciones)
    {
        $this->operaciones->removeElement($operaciones);
    }

    /**
     * Get operaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperaciones()
    {
        return $this->operaciones;
    }

    public function __toString()
    {
        return $this->descripcion;
    }
}
