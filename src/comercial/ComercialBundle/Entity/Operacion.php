<?php

namespace comercial\ComercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operacion
 *
 * @ORM\Table(name="operacion")
 * @ORM\Entity(repositoryClass="comercial\ComercialBundle\Repository\OperacionRepository")
 */
class Operacion
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="importeCUC", type="decimal", precision=10, scale=2)
     */
    private $importeCUC;

    /**
     * @var string
     *
     * @ORM\Column(name="importeMN", type="decimal", precision=10, scale=2)
     */
    private $importeMN;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="tipoOperacion", type="object")
     */
    private $tipoOperacion;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Operacion
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set importeCUC
     *
     * @param string $importeCUC
     * @return Operacion
     */
    public function setImporteCUC($importeCUC)
    {
        $this->importeCUC = $importeCUC;

        return $this;
    }

    /**
     * Get importeCUC
     *
     * @return string 
     */
    public function getImporteCUC()
    {
        return $this->importeCUC;
    }

    /**
     * Set importeMN
     *
     * @param string $importeMN
     * @return Operacion
     */
    public function setImporteMN($importeMN)
    {
        $this->importeMN = $importeMN;

        return $this;
    }

    /**
     * Get importeMN
     *
     * @return string 
     */
    public function getImporteMN()
    {
        return $this->importeMN;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Operacion
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
     * Set tipoOperacion
     *
     * @param \stdClass $tipoOperacion
     * @return Operacion
     */
    public function setTipoOperacion($tipoOperacion)
    {
        $this->tipoOperacion = $tipoOperacion;

        return $this;
    }

    /**
     * Get tipoOperacion
     *
     * @return \stdClass 
     */
    public function getTipoOperacion()
    {
        return $this->tipoOperacion;
    }
}
