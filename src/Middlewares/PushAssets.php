<?php // strict

namespace Ceres\Middlewares;

use Ceres\Helper\BuildHash;
use Plenty\Plugin\Application;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Middleware;

class PushAssets extends Middleware
{

    public function before(Request $request)
    {
    }

    public function after(Request $request, Response $response):Response
    {
        /** @var Application $app */
        $app = pluginApp(Application::class);
        $assets = [
            'style' => [
                $app->getUrlPath('Ceres').'/css/ceres-category.css?v=' . BuildHash::get()
            ],
            'script' => [
                $app->getUrlPath('Ceres').'/js/dist/ceres-category.min.js?v=' . BuildHash::get()
            ]
        ];

        $linkHeader = '';
        foreach($assets as $type => $files)
        {
            foreach($files as $file)
            {
                if(strlen($linkHeader))
                {
                    $linkHeader .= ', ';
                }
                $linkHeader .= '<' .$file. '>; as=' . $type . '; rel=preload';
            }
        }

        return $response->make(
            $response->content(),
            $response->status(),
            [
                'Link' => $linkHeader
            ]
        );
    }
}
