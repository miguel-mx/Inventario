<?php
namespace CCM\InventarioBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use CCM\InventarioBundle\Entity\Descripcion;
use CCM\InventarioBundle\Entity\Marca;
use CCM\InventarioBundle\Entity\Ubicacion;
use CCM\InventarioBundle\Entity\Responsable;
use Symfony\Component\Validator\Constraints\DateTime;

class otherCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('importa:datos')
            ->setDescription('Importa registros del archivo .csv a la tabla deceada')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'Archivo a importar?'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('file');

        if (!file_exists($filename)) {
            $output->writeln('<error>Error: El archivo ' . $filename .' no existe</error>');
            return;
        }

        $contenedor = $this->getContainer();
        $em = $contenedor->get('doctrine')->getManager();
        // $csvFile = file($filename);
        $csv = array_map('str_getcsv', file($filename));
        $csv = array_unique($csv,SORT_REGULAR);
            foreach ($csv as $line){
                //$entity =new Responsable();
                $entity = new Ubicacion();
                //$entity = new Descripcion();
               /*
                $entity->setUbicacion($line[0]);
                $entity->setTitulo($line[1]);
                $entity->setNombre($line[2]);
                $entity->setApellidos($line[3]);
                $em->persist($entity);
                $em->flush();*/
                $entity->setNombre($line[0]);
                $em->persist($entity);
                $em->flush();



            }

    }
}

