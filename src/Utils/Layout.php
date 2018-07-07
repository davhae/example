<?php

namespace davhae\example\Utils;


class Layout
{
    private const HTML_HEAD_NAME = 'head';
    private const HTML_FOOT_NAME = 'foot';
    private const VUE_HEADER = 'header';
    private const VUE_FOOTER = 'footer';


    /**
     * @param mixed ...$vueComponent
     * @return string
     *
     * concat HTML and add vue component
     */
    public function getFrontend(...$vueComponent): string
    {
        $view = '';
        // DOCTYPE and <head>
        $view .= $this->getHTMLLayout(self::HTML_HEAD_NAME);

        // Create html for vue components
        foreach ($vueComponent as $component) {
            $view .= '<div id="' . $component . '"></div>' . PHP_EOL;
        }

        // javascript and closing tags
        $view .= $this->getHTMLLayout(self::HTML_FOOT_NAME);

        return $view;
    }

    /**
     * @param mixed ...$layoutNames
     * @return string
     *
     * combines the layout files
     */
    public function getHTMLLayout(...$layoutNames): string
    {
        $layoutContent = '';
        foreach ($layoutNames as $layoutName){
            $layoutContent .=  file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../resources/private/templates/' . $layoutName . '.html');
        }
        return $layoutContent;
    }
}