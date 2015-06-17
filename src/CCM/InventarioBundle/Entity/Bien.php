<?php

namespace CCM\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Bien
 *
 * @ORM\Table()
 * @ORM\Entity
 */
/**
 * @ORM\Entity(repositoryClass="CCM\InventarioBundle\Entity\BienRepository")
 * @ORM\HasLifecycleCallbacks
 */

class Bien
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="inventario", type="string", length=255, nullable=true)
     */
    private $inventario;

    /**
     * @var string
     *
     * @ORM\Column(name="sicop", type="string", length=255, nullable=true)
     */
    private $sicop;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adquisicion", type="date",nullable=true)
     */
    private $adquisicion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string",  nullable=true,length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string",  nullable=true,length=255)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string",  nullable=true,length=255)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="serie", type="string",  nullable=true,length=255)
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="text", nullable=true)
     */
    private $comentario;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string",  nullable=true,length=255)
     */
    private $ubicacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valido", type="boolean", nullable=true)
     */
    private $valido;



    /**
     * @var boolean
     *
     * @ORM\Column(name="estatus", type="boolean", nullable=true)
     */
    private $estatus;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string",  nullable=true,length=255)
     */
    private $foto;

    /**
     * @ORM\ManyToOne(targetEntity="CCM\InventarioBundle\Entity\Responsable")
     * @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     **/
    private $responsable;

    /**
     * @ORM\ManyToOne(targetEntity="CCM\InventarioBundle\Entity\Categoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     **/
    private $categoria;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modificado;


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
     * Set sicop
     *
     * @param string $sicop
     * @return Bien
     */
    public function setSicop($sicop)
    {
        $this->sicop = $sicop;

        return $this;
    }

    /**
     * Get sicop
     *
     * @return string 
     */
    public function getSicop()
    {
        return $this->sicop;
    }

    /**
     * Set adquisicion
     *
     * @param \DateTime $adquisicion
     * @return Bien
     */
    public function setAdquisicion($adquisicion)
    {
        $this->adquisicion = $adquisicion;

        return $this;
    }

    /**
     * Get adquisicion
     *
     * @return \DateTime 
     */
    public function getAdquisicion()
    {
        return $this->adquisicion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Bien
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
     * Set marca
     *
     * @param string $marca
     * @return Bien
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Bien
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set serie
     *
     * @param string $serie
     * @return Bien
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return string 
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Bien
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Bien
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set valido
     *
     * @param boolean $valido
     * @return Bien
     */
    public function setValido($valido)
    {
        $this->valido = $valido;

        return $this;
    }

    /**
     * Get valido
     *
     * @return boolean 
     */
    public function getValido()
    {
        return $this->valido;
    }


    /**
     * Set estatus
     *
     * @param boolean $estatus
     * @return Bien
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return boolean
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Bien
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->creado = new \DateTime();
        $this->setModificado(new \DateTime());
    }
    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setModificado(new \DateTime());
    }

    /**
     * Set creado
     *
     * @param \DateTime $creado
     * @return Bien
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;
        return $this;
    }
    /**
     * Get creado
     *
     * @return \Datetime
     */
    public function getCreado()
    {
        return $this->creado;
    }
    /**
     * Set modificado
     *
     * @param datetime $modificado
     */
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
    }
    /**
     * Get modificado
     *
     * @return string
     */
    public function getModificado()
    {
        return $this->modificado;
    }

    /**
     * Set responsable
     *
     * @param \CCM\InventarioBundle\Entity\Responsable $responsable
     * @return Bien
     */
    public function setResponsable(\CCM\InventarioBundle\Entity\Responsable $responsable = null)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return \CCM\InventarioBundle\Entity\Responsable
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set categoria
     *
     * @param \CCM\InventarioBundle\Entity\Categoria $categoria
     * @return Bien
     */
    public function setCategoria(\CCM\InventarioBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \CCM\InventarioBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }



    /**
     * Set inventario
     *
     * @param string $inventario
     * @return Bien
     */
    public function setInventario($inventario)
    {
        $this->inventario = $inventario;

        return $this;
    }

    /**
     * Get inventario
     *
     * @return string 
     */
    public function getInventario()
    {
        return $this->inventario;
    }
    public function __toString()
    {
        return $this->getSicop();

    }
}
