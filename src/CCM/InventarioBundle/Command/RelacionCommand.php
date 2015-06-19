<?php
namespace CCM\InventarioBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use CCM\InventarioBundle\Entity\Responsable;
use CCM\InventarioBundle\Entity\Bien;
use Symfony\Component\Validator\Constraints\DateTime;
class RelacionCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('agrega:relacion')
            ->setDescription('Agrega responsable por la ubicacion del bien')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $bienes = new Bien();
        $responsables = new Responsable();
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $bienes = $em->getRepository('InventarioBundle:Bien')->findAll();
        $responsables = $em->getRepository('InventarioBundle:Responsable')->findAll();
        foreach($bienes as $bien){
            foreach($responsables as $responsable)
                if($bien->getUbicacion()==$responsable->getUbicacion()){
                    $bien->setResponsable($responsable);
                    $em->persist($bien);
                    $em->persist($responsable); //persisto sin modificar nada
                    $em->flush();
                }
            }


        }

}

