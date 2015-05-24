<?php

namespace CCM\InventarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * InventarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BienRepository extends EntityRepository
{


    public function findDatos(array $datos)
    {

        $em = $this->getEntityManager();
        $dql = 'SELECT b FROM InventarioBundle:Bien b WHERE b.noInventario = :noInventario or b.marca = :marca';
        $consulta = $em->createQuery($dql);
        //$consulta->setParameter('noInventario',$noInventario['no_inventario']);

        $consulta->setParameters(array(
            'noInventario' => $datos['no_inventario'],
            'marca' => $datos['marca']

        ));

        return $consulta->getOneOrNullResult();
    }

    public function findBien($noInventario)
    {

        $em = $this->getEntityManager();
        $dql = 'SELECT b FROM InventarioBundle:Bien b WHERE b.noInventario = :noInventario';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('noInventario', $noInventario);
        return $consulta->getOneOrNullResult();
    }

    public function findCategoria($catego)
    {
        $em = $this->getEntityManager();
        $dql = 'SELECT b FROM InventarioBundle:Bien b WHERE b.categoria = :catego ';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('catego', $catego);
        return $consulta->getResult();
    }

}