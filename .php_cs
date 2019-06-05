<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('bootstrap/cache')
    ->exclude('docker')
    ->exclude('storage')
    ->exclude('deploy')
    ->exclude('vendor')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        '@Symfony' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'concat_space' => ['spacing' => 'one'],
        'phpdoc_separation' => true,
        'yoda_style' => false
    ])
	->setIndent("\t")
    ->setFinder($finder)
;
