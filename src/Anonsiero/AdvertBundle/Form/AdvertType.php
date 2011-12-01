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
            ->add('negotiation', 'checkbox', array(
                'required'  => false
            ))
            ->add('country', 'text', array(
                'required'  => false
            ))
            ->add('province', 'text', array(
                'required'  => false
            ))
            ->add('city', 'text', array(
                'required'  => false
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
