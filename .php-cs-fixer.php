<?php

declare(strict_types=1);

return
    (new PhpCsFixer\Config())
        ->setCacheFile(__DIR__ . '/var/cache/.php_cs')
        ->setFinder(
            PhpCsFixer\Finder::create()
                ->in([
                    __DIR__ . '/src/plib/library',
                ])
                ->in([
                    __DIR__ . '/tests',
                ])
                ->append([
                    __FILE__,
                ])
        )
        ->setRules([
            '@PSR12' => true,
            '@PSR12:risky' => true,
            '@PhpCsFixer' => true,
            'ordered_imports' => ['imports_order' => ['class', 'function', 'const']],
            'concat_space' => ['spacing' => 'one'],
            'cast_spaces' => ['space' => 'none'],
            'binary_operator_spaces' => false,
            'phpdoc_to_comment' => false,
            'phpdoc_separation' => false,
            'phpdoc_types_order' => ['null_adjustment' => 'always_last'],
            'phpdoc_align' => false,
            'operator_linebreak' => false,
            'global_namespace_import' => true,
            'blank_line_before_statement' => false,
            'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
            'fopen_flags' => ['b_mode' => true],
            'yoda_style' => false,
            'final_class' => true,
            'final_public_method_for_abstract_class' => true,
            'self_static_accessor' => true,
            'static_lambda' => true,
        ]);
