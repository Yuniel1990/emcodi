<?php

namespace comercial\ComercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comprador
 *
 * @ORM\Table(name="comprador")
 * @ORM\Entity(repositoryClass="comercial\ComercialBundle\Repository\CompradorRepository")
 */
class Comprador
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
     * @ORM\Column(name="codigo", type="string", length=20, unique=true)
     */
    private $codigo;

    /**
     * @var \stdClass
     *
     * @ORM\OneToMany(targetEntity="comercial\ComercialBundle\Entity\Operacion", mappedBy="comprador")
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
     * @return Comprador
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
     * Set codigo
     *
     * @param string $codigo
     * @return Comprador
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set operaciones
     *
     * @param \stdClass $operaciones
     * @return Comprador
     */
    public function setOperaciones($operaciones)
    {
        $this->operaciones = $operaciones;

        return $this;
    }

    /**
     * Get operaciones
     *
     * @return \stdClass 
     */
    public function getOperaciones()
    {
        return $this->operaciones;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add operaciones
     *
     * @param \comercial\ComercialBundle\Entity\Operacion $operaciones
     * @return Comprador
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

    public function __toString()
    {
        return $this->descripcion;
    }
}
