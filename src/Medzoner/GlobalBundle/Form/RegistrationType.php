<?php

namespace Medzoner\GlobalBundle\Form;

use CoinhiveBundle\Form\CoinHiveCaptchaType;
use CoinhiveBundle\Validator\IsTrue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RegistrationType.
 */
class RegistrationType extends AbstractType
{
    /**
     * Build the registration form.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('coinhive-captcha-token', CoinHiveCaptchaType::class, [
                'mapped'      => false,
                'constraints' => [
                    new IsTrue()
                ]
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Medzoner\Domain\Command\RegisterContactCommand',
            'csrf_protection' => false,
            'csrf_field_name' => '_token',
        ]);
    }

    /**
     * Get the form name.
     *
     * @return string
     */
    public function getName()
    {
        return 'contact';
    }
}
