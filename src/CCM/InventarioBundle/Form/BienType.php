<?php

namespace CCM\InventarioBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use CCM\InventarioBundle\Entity\Descripcion;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BienType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('inventario')
            ->add('sicop')
            ->add('adquisicion', 'date', array('input' => 'datetime','widget' => 'single_text','format' => 'dd-MM-yyyy',))
            ->add('marca')
            ->add('modelo','text',array('required'=>false))
            ->add('serie','text',array('required'=>false))
            ->add('comentario','textarea',array('required'=>false))
            ->add('ubicacion','text',array('required'=>false))
            ->add('valido')
            ->add('estatus')
            ->add('foto','text',array('required'=>false))
            ->add('responsable') //por default no requerido!!
            ->add('categoria')  //por default no requerido!!
        ;
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $bien = $event->getData();
            $form = $event->getForm();

            // check if the Bien object is "new"
            // If no data is passed to the form, the data is "null".
            // This should be considered a new "Bien"
            if (!$bien || null === $bien->getId()) {
                $form->add('descripcion', 'entity', array(
                    'class' => 'InventarioBundle:Descripcion',
                    'required'    => false

                ));
            }
            else{
                $form->add('descripcion','entity', array(
                    'class' => 'InventarioBundle:Descripcion',
                    'required'    => false,
                    'empty_value' => $bien->getDescripcion()

                ));
            }
        });
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
