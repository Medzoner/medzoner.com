<?php

namespace Site\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title')
                ->add('author')
                ->add('description','textarea')
                ->add('image')
                ->add('tags', 'choice', array(
                    'multiple' => true,'required' => false,))
                ->add('created')
                ->add('updated')
                ->add('slug')
                ->add('file');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Site\BlogBundle\Entity\Blog'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'site_blogbundle_blog';
    }

}
