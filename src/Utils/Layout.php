<?php

namespace davhae\example\Utils;

/**
 * Class Layout
 * @package davhae\example\Utils
 *
 * Handles the output of templates, vue components and php templates(TODO:maybe)
 */
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
    public function getFrontend($template, ...$vueComponent): string
    {
        $view = '';
        // DOCTYPE and <head>
        $view .= $this->getLayout(self::HTML_HEAD_NAME);

        // check and use another html template
        if (isset($htmlTemplate)) {
            $templatePath = $this->getLayoutPath($template);
            if (file_exists($templatePath)) {
                $view .= $this->getLayout($template);
            }
        }
        // Create html for vue components
        foreach ($vueComponent as $component) {
            $view .= '<div id="' . $component . '"></div>' . PHP_EOL;
        }

        // javascript and closing tags
        $view .= $this->getLayout(self::HTML_FOOT_NAME);

        return $view;
    }

    /**
     * @param mixed ...$layoutNames
     * @return string
     *
     * combines the layout files
     */
    public function getLayout(...$layoutNames): string
    {
        $layoutContent = '';
        foreach ($layoutNames as $layoutName) {
            $layoutPath = $this->getLayoutPath($layoutName);
            // only load the file if it's available
            if (file_exists($layoutPath)){
                $layoutContent .= file_get_contents($this->getLayoutPath($layoutName));
            }
        }
        return $layoutContent;
    }

    /**
     * @param $layoutName
     * @return string
     *
     * gets the full path of a layout
     */
    public function getLayoutPath($layoutName)
    {
        $layoutPath = $_SERVER['DOCUMENT_ROOT'] . '/../resources/private/templates/' . $layoutName . '.html';
        return $layoutPath;
    }
}