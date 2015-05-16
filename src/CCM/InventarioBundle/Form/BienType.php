<?php

namespace CCM\InventarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            ->add('descripcion')
            ->add('marca')
            ->add('modelo')
            ->add('serie')
            ->add('comentario')
            ->add('ubicacion')
            ->add('validoFis')
            ->add('tipoAdq')
            ->add('estatus')
            ->add('foto')
            ->add('responsable')
            ->add('categoria')
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
