<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 *
 * @ORM\Table(name="items")
 * @ORM\Entity
 */
class Items
{
    /**
     * @var string
     *
     * @ORM\Column(name="Codigo", type="string", length=255, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Precio", type="string", length=255, nullable=false)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="Series", type="string", length=255, nullable=false)
     */
    private $series;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdMarca", type="integer", nullable=false)
     */
    private $idmarca;

    /**
     * @var integer
     *
     * @ORM\Column(name="Descripcion", type="integer", nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdItem", type="integer")
     * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $iditem;



    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Items
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Items
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Items
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set series
     *
     * @param string $series
     *
     * @return Items
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set idmarca
     *
     * @param integer $idmarca
     *
     * @return Items
     */
    public function setIdmarca($idmarca)
    {
        $this->idmarca = $idmarca;

        return $this;
    }

    /**
     * Get idmarca
     *
     * @return integer
     */
    public function getIdmarca()
    {
        return $this->idmarca;
    }

    /**
     * Set descripcion
     *
     * @param integer $descripcion
     *
     * @return Items
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return integer
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get iditem
     *
     * @return integer
     */
    public function getIditem()
    {
        return $this->iditem;
    }
}
