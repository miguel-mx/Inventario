<?php
namespace CCM\InventarioBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use CCM\InventarioBundle\Entity\Descripcion;
use CCM\InventarioBundle\Entity\Marca;
use Symfony\Component\Validator\Constraints\DateTime;

class otherCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('obt:datos')
            ->setDescription('asdf');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $contenedor = $this->getContainer();
        $em = $contenedor->get('doctrine')->getManager();
        //$csvFile = file('/home/hugo/Desktop/desc.csv');
        $csvFile = file('/home/ccmunam/Downloads/marca.csv');
        $data = array();
        $i = 0;
            $array = array_unique($csvFile);
            foreach ($array as $line){
                $entity = new Descripcion();
                //$entity = new Marca();
                $data[] = str_getcsv($line);
                $entity->setNombre($data[$i][0]);
                $em->persist($entity);
                $em->flush();
                $i++;
            }

    }
}

