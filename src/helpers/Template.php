<?php

namespace Helpers;

class Template
{
    /**
     * Load component
     *
     * @param string $path
     * @param array $data
     * @return void
     */
    static function render_component(string $path, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . '/../components/' . $path . '.php';
        $cmpnt = ob_get_contents();
        ob_end_clean();

        echo $cmpnt;

        return;
    }
}