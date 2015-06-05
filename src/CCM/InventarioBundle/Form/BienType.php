<?php

namespace CCM\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use CCM\InventarioBundle\Entity\Descripcion;

class BienType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('noInventario')
            ->add('folioSicop')
            ->add('fechaAdq', 'date', array('input' => 'datetime','widget' => 'single_text','format' => 'dd-MM-yyyy',))
            ->add('descripcion', 'entity', array(
                'class' => 'InventarioBundle:Descripcion',
                'empty_data'  => false,

            ))
            ->add('marca')
            ->add('modelo','text',array('required'=>false))
            ->add('serie','text',array('required'=>false))
            ->add('comentario','textarea',array('required'=>false))
            ->add('ubicacion','text',array('required'=>false))
            ->add('validoFis')
            ->add('tipoAdq') //por defaul no req
            ->add('estatus')
            ->add('foto','text',array('required'=>false))
            ->add('responsable') //por default no requerido!!
            ->add('categoria')  //por default no requerido!!
            ->add('costo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CCM\InventarioBundle\Entity\Bien'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ccm_inventariobundle_bien';
    }
}
