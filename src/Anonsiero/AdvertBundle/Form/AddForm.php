<?php

namespace Anonsiero\AdvertBundle\Form\AddForm;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AddForm extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('short_desc', 'textarea')
            ->add('description', 'textarea')
            ->add('price', 'money', array('precision' => 2, 'currency' => 'PL'))
            ->add('negotiation', 'checkbox');        
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
