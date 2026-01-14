<?php

namespace App\Form;

use App\Entity\MemeProduct;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemeProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                    'label' => 'Product Title',
                ])
            ->add('price', MoneyType::class, [
                    'currency' => 'USD',
                ])
            ->add('isRare', CheckboxType::class, [
                    'label' => 'Is Rare?',
                    'required' => false,
                ])
            ->add('tags', TextType::class, [
                    'label' => 'Product Tags (comma separated)',
                    'required' => false,
                ])
            ->add('categoryId', IntegerType::class, [
                    'label' => 'Category ID',
                ])
            ->add('save', SubmitType::class, ['label' => 'Create Product'])
        ;

        $builder->get('tags')
            ->addModelTransformer(new CallbackTransformer(
                    function ($tagsAsArray): string {
                        // transform the array to a string
                        return implode(', ', $tagsAsArray ?? []);
                    },
                    function ($tagsAsString): array {
                        // transform the string back to an array
                        return explode(', ', $tagsAsString ?? '');
                    }
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MemeProduct::class,
        ]);
    }
}
