<?php

namespace comercial\ComercialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RangoFechaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateFrom', DateType::class, array('format'=>'yyyy-MM-dd','widget'=>'single_text','required' =>true,'label' => 'Desde:','attr' => array('class' => 'form-control form-control-inline input-medium')))
            ->add('dateTo', DateType::class, array('format'=>'yyyy-MM-dd','widget'=>'single_text','required' =>true,'label' => 'Hasta:','attr' => array('class' => 'form-control form-control-inline input-medium')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'comercial_bundle_rango_fecha_type';
    }
}
