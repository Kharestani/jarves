<?php
/**
 * This file is part of Jarves.
 *
 * (c) Marc J. Schmidt <marc@marcjschmidt.de>
 *
 *     J.A.R.V.E.S - Just A Rather Very Easy [content management] System.
 *
 *     http://jarves.io
 *
 * To get the full copyright and license information, please view the
 * LICENSE file, that was distributed with this source code.
 */

namespace Jarves\Twig;

use Jarves\ContentTypes\Markdowner;
use Jarves\PageStack;

class MarkdownerExtension extends \Twig_Extension
{
    /**
     * @var Markdowner
     */
    private $markdowner;

    /**
     * @param Markdowner $markdowner
     */
    function __construct(Markdowner $markdowner)
    {
        $this->markdowner = $markdowner;
    }

    public function getName()
    {
        return 'markdowner';
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('markdowner', array($this, 'markdown'), array('is_safe' => array('html'))),
        );
    }

    public function markdown($text)
    {
        return $this->markdowner->transform($text);
    }

}