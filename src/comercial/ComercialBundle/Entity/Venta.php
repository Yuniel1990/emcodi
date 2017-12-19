<?php

namespace comercial\ComercialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 *
 * @ORM\Table(name="venta")
 * @ORM\Entity(repositoryClass="comercial\ComercialBundle\Repository\VentaRepository")
 */
class Venta
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
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="noFactura", type="string", length=20, unique=true)
     */
    private $noFactura;

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
     * @ORM\Column(name="ventaTotal", type="decimal", precision=10, scale=2)
     */
    private $ventaTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="costoCUC", type="decimal", precision=10, scale=2)
     */
    private $costoCUC;

    /**
     * @var string
     *
     * @ORM\Column(name="costoMN", type="decimal", precision=10, scale=2)
     */
    private $costoMN;

    /**
     * @var string
     *
     * @ORM\Column(name="costoTotal", type="decimal", precision=10, scale=2)
     */
    private $costoTotal;


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
     * Set noFactura
     *
     * @param string $noFactura
     * @return Venta
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
     * Set importeCUC
     *
     * @param string $importeCUC
     * @return Venta
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
     * @return Venta
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
     * Set ventaTotal
     *
     * @param string $ventaTotal
     * @return Venta
     */
    public function setVentaTotal($ventaTotal)
    {
        $this->ventaTotal = $ventaTotal;

        return $this;
    }

    /**
     * Get ventaTotal
     *
     * @return string 
     */
    public function getVentaTotal()
    {
        return $this->ventaTotal;
    }

    /**
     * Set costoCUC
     *
     * @param string $costoCUC
     * @return Venta
     */
    public function setCostoCUC($costoCUC)
    {
        $this->costoCUC = $costoCUC;

        return $this;
    }

    /**
     * Get costoCUC
     *
     * @return string 
     */
    public function getCostoCUC()
    {
        return $this->costoCUC;
    }

    /**
     * Set costoMN
     *
     * @param string $costoMN
     * @return Venta
     */
    public function setCostoMN($costoMN)
    {
        $this->costoMN = $costoMN;

        return $this;
    }

    /**
     * Get costoMN
     *
     * @return string 
     */
    public function getCostoMN()
    {
        return $this->costoMN;
    }

    /**
     * Set costoTotal
     *
     * @param string $costoTotal
     * @return Venta
     */
    public function setCostoTotal($costoTotal)
    {
        $this->costoTotal = $costoTotal;

        return $this;
    }

    /**
     * Get costoTotal
     *
     * @return string 
     */
    public function getCostoTotal()
    {
        return $this->costoTotal;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Venta
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
}
