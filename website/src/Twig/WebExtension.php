<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class WebExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('filter_name', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('pluralize', [$this, 'doSomething']),
        ];
    }

    //return a string
    public function doSomething(int $count, string $singular, ?string $plural = null): string 
    {
        //si le pluriel existe (si pluriel vrai) alors rajoute un 's' à la fin
        $plural ??= $singular.'s';

        //si nb = 1 alors str est singulier, sinon il est pluriel et tu rajoutes le 's' à la fin
        $str = $count === 1? $singular : $plural;
        return "$count $str";
    }
}
