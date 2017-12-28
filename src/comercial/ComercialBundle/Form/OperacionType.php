<?php

namespace comercial\ComercialBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OperacionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha',DateType::class,array('format'=>'yyyy-MM-dd','widget'=>'single_text','required' =>true,'label' => 'Fecha Confeccion:','attr' => array('class' => 'form-control form-control-inline input-medium')))
            ->add('comprador',EntityType::class, array('required'=>true, 'label'=>'Nombre del comprador:', 'class'=>'comercial\ComercialBundle\Entity\Comprador','choice_label'=>'descripcion' ,'placeholder'=>"Seleccionar",
                'attr' => array('class' => 'form-control input-medium')))
            ->add('noFactura', TextType::class,array('required' =>true,'label' => 'Numero de la Factura:','attr' => array('placeholder'=>"Numero de la Factura",'class' => 'form-control  input-medium')))
            ->add('ordenDespacho', TextType::class,array('required' =>true,'label' => 'Orden de Venta:','attr' => array('placeholder'=>"Orden de Venta",'class' => 'form-control form-control-inline input-medium')))
            ->add('costoMN',TextType::class,array('required' =>true,'label' => 'Costo en MN:','attr' => array('placeholder'=>"Costo en MN",'class' => 'form-control form-control-inline input-medium')))
            ->add('costoCUC',TextType::class,array('required' =>true,'label' => 'Costo en CUC:','attr' => array('placeholder'=>"Costo en CUC",'class' => 'form-control form-control-inline input-medium')))
            ->add('importeMN',TextType::class,array('required' =>true,'label' => 'Importe en MN:','attr' => array('placeholder'=>"Importe en MN",'class' => 'form-control form-control-inline input-medium')))
            ->add('importeCUC',TextType::class,array('required' =>true,'label' => 'Importe en CUC:','attr' => array('placeholder'=>"Importe en CUC",'class' => 'form-control form-control-inline input-medium')))
            ->add('tipoOperacion', EntityType::class, array('required'=>true, 'label'=>'Tipo de operacion:', 'class'=>'comercial\ComercialBundle\Entity\TipoOperacion',
                'choice_label'=>'descripcion' ,'placeholder'=>"Seleccionar", 'attr' => array('class' => 'form-control input-medium')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'comercial\ComercialBundle\Entity\Operacion'
        ));
    }
}
