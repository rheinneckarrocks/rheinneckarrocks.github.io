<?php

/*
 * This file is part of the Rhein Neckar Rocks Crawler project.
 *
 * (c) Rhein Neckar Rocks
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rheinneckarrocks;

class TwigExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return __CLASS__;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('unixtime', array($this, 'unixtime')),
            new \Twig_SimpleFilter('type_css_class', array($this, 'type_css_class')),
        );
    }

    /**
     * Wrapper for the php internal strtotime function.
     *
     * @param string $datetime
     * @return string
     */
    public function unixtime($datetime)
    {
        return $datetime.'000';
    }

    /**
     * Returns css class for the event used by the event calendar.
     *
     * @param string $type
     * @return string
     */
    public function type_css_class($type)
    {
        switch($type) {
            case 'conference':
                return 'event-important';

            case 'unconference':
                return 'event-success';

            case 'hackathon':
                return 'event-warning';

            default:
                return 'event-info';
        }
    }
}
