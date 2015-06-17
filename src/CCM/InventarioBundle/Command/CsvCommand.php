<?php
namespace CCM\InventarioBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use CCM\InventarioBundle\Entity\Bien;
use Symfony\Component\Validator\Constraints\DateTime;

class CsvCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('importa:bienes')
            ->setDescription('Importa registros del archivo .csv a la tabla Bien')
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
            $output->writeln('<error>Error: El archivo ' .  $filename .' no existe</error>');
            return;
        }

        $contenedor = $this->getContainer();
        $em = $contenedor->get('doctrine')->getManager();
        //$csvFile = file($filename);
        $data = array();
        $i = 0;
        $csvFile = array_map('str_getcsv', file($filename));
        foreach ($csvFile as $line) {
            //echo $i.'//';
            $entity = new Bien();
            //$data[] = str_getcsv($line);


            if($line[1]!='S/N') {

                $entity->setInventario($line[1]);
            }

            if($line[2]!='#N/A')
            {
                $entity->setSicop($line[2]);

            }

            if($line[3]!='#N/A')
            {

                $date0 = str_replace('DIC', 'DEC', $line[3]);
                $date1 = str_replace('ENE', 'JAN', $date0);
                $date2 = str_replace('ABR', 'APR', $date1);
                $date3 = str_replace('AGO', 'AUG', $date2);
                $date4 = str_replace('/', '-', $date3);
                $entity->setAdquisicion(new \DateTime($date4));
            }

            //echo $line[3] . '\n';
            $entity->setDescripcion($line[4]);

            if( $line[5]!='S/M') {

                $entity->setMarca($line[5]);
            }
            if( $line[6]!='S/M') {

                $entity->setModelo($line[6]);
            }

            if($line[7]!='S/S') {
                $entity->setSerie($line[7]);
            }

            $entity->setComentario($line[8]);
            $entity->setUbicacion($line[9]);
            if($line[10]=='ok'){

                $entity->setValido(1);
                $entity->setEstatus(1);
            }

            $entity->getCreado(new \DateTime());
            $entity->setModificado(new \DateTime());
            $em->persist($entity);
            $em->flush();
            $i++;

        }

    }
}

