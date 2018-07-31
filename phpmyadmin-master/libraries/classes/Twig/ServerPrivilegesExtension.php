<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * hold PhpMyAdmin\Twig\ServerPrivilegesExtension class
 *
 * @package PhpMyAdmin\Twig
 */
declare(strict_types=1);

namespace PhpMyAdmin\Twig;

use PhpMyAdmin\Server\Privileges;
use PhpMyAdmin\Template;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Class ServerPrivilegesExtension
 *
 * @package PhpMyAdmin\Twig
 */
class ServerPrivilegesExtension extends AbstractExtension
{
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return TwigFunction[]
     */
    public function getFunctions()
    {
        $serverPrivileges = new Privileges(new Template());
        return [
            new TwigFunction(
                'ServerPrivileges_formatPrivilege',
                [$serverPrivileges, 'formatPrivilege'],
                ['is_safe' => ['html']]
            ),
        ];
    }
}
