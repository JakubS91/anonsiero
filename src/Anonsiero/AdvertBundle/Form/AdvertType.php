<?php

namespace Anonsiero\AdvertBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AdvertType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('short_desc', 'textarea')
            ->add('description', 'textarea')
            ->add('category', 'entity', array(
                'class' => 'AnonsieroAdvertBundle:Category'
            ))
            ->add('price', 'text')
            ->add('other_adress', 'checkbox', array(
                'required'  => false
            ))
            ->add('negotiation', 'checkbox', array(
                'required'  => false
            ))
            ->add('phone', 'text', array(
                'required'  => false
            ))
            ->add('province', 'entity', array(
                'required'  => false,
                'class' => 'AnonsieroUserBundle:Province'
            ))
            ->add('city', 'entity', array(
                'required'  => false,
                'class' => 'AnonsieroUserBundle:City'
            ))
            ->add('postcode', 'text', array(
                'required'  => false
            ))
            ->add('street', 'text', array(
                'required'  => false
            ));        
    }
    
    public function getDefaultOptions(array $options)
	{
		return array(
            'data_class'	  => 'Anonsiero\AdvertBundle\Entity\Advert',
			'csrf_protection' => true,
			'csrf_field_name' => '_token',
			// a unique key to help generate the secret token
			'intention'       => 'task_item',
		);
	}

    public function getName()
    {
        return 'advertbundle_add';
    }
}

?>
