<?php

namespace CCM\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Bien
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
/**
 * @ORM\Entity(repositoryClass="CCM\InventarioBundle\Entity\BienRepository")
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
     * @ORM\Column(name="noInventario", type="string", length=255)
     */
    private $noInventario;

    /**
     * @var string
     *
     * @ORM\Column(name="folio_sicop", type="string", length=255)
     */
    private $folioSicop;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_adq", type="date")
     */
    private $fechaAdq;

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
     * @ORM\Column(name="valido_fis", type="boolean", nullable=true)
     */
    private $validoFis;

    /**
     * @ORM\ManyToOne(targetEntity="CCM\InventarioBundle\Entity\Adquisicion")
     * @ORM\JoinColumn(name="adquisicion_id", referencedColumnName="id")
     **/
    private $tipoAdq;

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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $creado;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modificado;

    /**
     * @var float
     * @ORM\Column(name="costo", type="float")
     * @Assert\Type(type="float", message="Must be a number.")
     * @Assert\NotBlank(message="No debe estar en blanco.")
     */

    private $costo;


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
     * Set folioSicop
     *
     * @param string $folioSicop
     * @return Bien
     */
    public function setFolioSicop($folioSicop)
    {
        $this->folioSicop = $folioSicop;

        return $this;
    }

    /**
     * Get folioSicop
     *
     * @return string 
     */
    public function getFolioSicop()
    {
        return $this->folioSicop;
    }

    /**
     * Set fechaAdq
     *
     * @param \DateTime $fechaAdq
     * @return Bien
     */
    public function setFechaAdq($fechaAdq)
    {
        $this->fechaAdq = $fechaAdq;

        return $this;
    }

    /**
     * Get fechaAdq
     *
     * @return \DateTime 
     */
    public function getFechaAdq()
    {
        return $this->fechaAdq;
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
     * Set validoFis
     *
     * @param boolean $validoFis
     * @return Bien
     */
    public function setValidoFis($validoFis)
    {
        $this->validoFis = $validoFis;

        return $this;
    }

    /**
     * Get validoFis
     *
     * @return boolean 
     */
    public function getValidoFis()
    {
        return $this->validoFis;
    }

    /**
 * Set tipoAdq
 *
 * @param string $tipoAdq
 * @return Bien
 */
    public function setTipoAdq($tipoAdq)
    {
        $this->tipoAdq = $tipoAdq;

        return $this;
    }

    /**
     * Get tipoAdq
     *
     * @return string 
     */
    public function getTipoAdq()
    {
        return $this->tipoAdq;
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
     * @param datetime $creado
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;
    }
    /**
     * Get creado
     *
     * @return string
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
     * Set noInventario
     *
     * @param string $noInventario
     * @return Bien
     */
    public function setNoInventario($noInventario)
    {
        $this->noInventario = $noInventario;

        return $this;
    }

    /**
     * Get noInventario
     *
     * @return string 
     */
    public function getNoInventario()
    {
        return $this->noInventario;
    }
    /**
     * Set costo
     *
     * @param float $costo
     * @return Bien
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }
    /**
     * Get costo
     *
     * @return float 
     */
    public function getCosto()
    {
        return $this->costo;
    }
    public function __toString()
    {
        return $this->getFolioSicop();

    }
}
