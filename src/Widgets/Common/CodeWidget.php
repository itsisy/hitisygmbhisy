<?php

namespace Ceres\Widgets\Common;

use Ceres\Widgets\Helper\BaseWidget;

class CodeWidget extends BaseWidget
{
    protected $template = "Ceres::Widgets.Common.CodeWidget";

    public function getData()
    {
        return [
            "identifier" => "Ceres::CodeWidget",
            "label" => "Widget.codeLabel",
            "previewImageURL" => "/images/widgets/code.svg",
            "type" => "static",
            "categories" => ["text"],
            "position" => 800,
            "settings" => [
                "customClass" => [
                    "type" => "text",
                    "required" => false,
                    "defaultValue" => "",
                    "options" => [
                        "name" => "Widget.customClass",
                        "tooltipText" => "Widget.customClassTooltip"
                    ]
                ]
            ]
        ];
    }
}
