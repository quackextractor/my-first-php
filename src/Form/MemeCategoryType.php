<?php

namespace App\Form;

use App\Entity\MemeCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemeCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                    'label' => 'Category Name',
                ])
            ->add('description', TextareaType::class, [
                    'required' => false,
                ])
            ->add('isActive', CheckboxType::class, [
                    'label' => 'Is Active',
                    'required' => false,
                ])
            ->add('metaKeywords', TextType::class, [
                    'label' => 'Keywords (comma separated)',
                    'required' => false,
                ])
            ->add('save', SubmitType::class, ['label' => 'Create Category'])
        ;

        $builder->get('metaKeywords')
            ->addModelTransformer(new CallbackTransformer(
                    function ($keywordsArray): string {
                        // transform the array to a string
                        return implode(', ', $keywordsArray ?? []);
                    },
                    function ($keywordsString): array {
                        // transform the string back to an array
                        return explode(', ', $keywordsString ?? '');
                    }
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MemeCategory::class,
        ]);
    }
}
