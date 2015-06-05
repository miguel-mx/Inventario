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
            $output->writeln('<error>Error: El archivo ' . $filename .' no existe</error>');
            return;
        }

        $contenedor = $this->getContainer();
        $em = $contenedor->get('doctrine')->getManager();

        $csvFile = file($filename);
        $data = array();
        $i = 0;

        foreach ($csvFile as $line) {
            $entity = new Bien();
            $data[] = str_getcsv($line);
            //print_r($data[$i++]);
            $entity->setNoInventario($data[$i][1]);
            $entity->setFolioSicop($data[$i][2]);
            $date0= str_replace('DIC','DEC',$data[$i][3]);
            $date1= str_replace('ENE','JAN',$date0);
            $date2= str_replace('ABR','APR',$date1);
            $date3= str_replace('AGO','AUG',$date2);
            $date4= str_replace('/', '-',$date3);
            $entity->setFechaAdq(new \DateTime($date4));
            echo $data[$i][3] . '\n';
            $entity->setDescripcion($data[$i][4]);
            $entity->setMarca($data[$i][5]);
            $entity->setModelo($data[$i][6]);
            $entity->setSerie($data[$i][7]);
            $entity->setComentario($data[$i][8]);
            $entity->setUbicacion($data[$i][9]);
            if($data[$i][10]=='ok'){
                $entity->setValidoFis(1);
            }
            $entity->setEstatus(1);
            $entity->getCreado(new \DateTime());
            $entity->setModificado(new \DateTime());


            $em->persist($entity);
            $em->flush();
            $i++;

        }

    }
}

