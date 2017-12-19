<?php

namespace comercial\ComercialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VentaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('noFactura')
            ->add('importeCUC')
            ->add('importeMN')
            ->add('ventaTotal')
            ->add('costoCUC')
            ->add('costoMN')
            ->add('costoTotal')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'comercial\ComercialBundle\Entity\Venta'
        ));
    }
}
