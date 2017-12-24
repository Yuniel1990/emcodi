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
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="comercial\ComercialBundle\Entity\Comprador", inversedBy="operaciones")
     * @ORM\JoinColumn(name="comprador_id", referencedColumnName="id")
     */
    private $comprador;

    /**
     * @var string
     *
     * @ORM\Column(name="noFactura", type="string", length=255)
     */
    private $noFactura;

    /**
     * @var string
     *
     * @ORM\Column(name="ordenDespacho", type="string", length=255)
     */
    private $ordenDespacho;

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
     * @ORM\Column(name="total", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $total;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="comercial\ComercialBundle\Entity\TipoOperacion", inversedBy="operaciones")
     * @ORM\JoinColumn(name="tipoOperacion_id", referencedColumnName="id")
     */
    private $tipoOperacion;

    public function SacarVentaNeta($descuento)
    {
        $flag = $this->importeCUC + $this->importeMN;
        if ($flag!=0){
            $porciento = ($flag*$descuento)/100;

            return $this->total = $flag - $porciento;
        }
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
     * Set noFactura
     *
     * @param string $noFactura
     * @return Operacion
     */
    public function setNoFactura($noFactura)
    {
        $this->noFactura = $noFactura;

        return $this;
    }

    /**
     * Get noFactura
     *
     * @return string 
     */
    public function getNoFactura()
    {
        return $this->noFactura;
    }

    /**
     * Set ordenDespacho
     *
     * @param string $ordenDespacho
     * @return Operacion
     */
    public function setOrdenDespacho($ordenDespacho)
    {
        $this->ordenDespacho = $ordenDespacho;

        return $this;
    }

    /**
     * Get ordenDespacho
     *
     * @return string 
     */
    public function getOrdenDespacho()
    {
        return $this->ordenDespacho;
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
     * Set total
     *
     * @param string $total
     * @return Operacion
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set comprador
     *
     * @param \comercial\ComercialBundle\Entity\Comprador $comprador
     * @return Operacion
     */
    public function setComprador(\comercial\ComercialBundle\Entity\Comprador $comprador = null)
    {
        $this->comprador = $comprador;

        return $this;
    }

    /**
     * Get comprador
     *
     * @return \comercial\ComercialBundle\Entity\Comprador 
     */
    public function getComprador()
    {
        return $this->comprador;
    }

    /**
     * Set tipoOperacion
     *
     * @param \comercial\ComercialBundle\Entity\TipoOperacion $tipoOperacion
     * @return Operacion
     */
    public function setTipoOperacion(\comercial\ComercialBundle\Entity\TipoOperacion $tipoOperacion = null)
    {
        $this->tipoOperacion = $tipoOperacion;

        return $this;
    }

    /**
     * Get tipoOperacion
     *
     * @return \comercial\ComercialBundle\Entity\TipoOperacion 
     */
    public function getTipoOperacion()
    {
        return $this->tipoOperacion;
    }
}
