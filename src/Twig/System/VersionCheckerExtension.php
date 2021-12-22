<?php

namespace App\Twig\System;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class VersionCheckerExtension extends AbstractExtension
{

    public function getFunctions(): array
    {
        return [
            new TwigFunction('checkVersion', [$this, 'checkVersion']),
            new TwigFunction('getVersion', [$this, 'getVersion'])
        ];
    }

    public function getVersion(): string
    {
        return $_ENV['VERSION'];
    }

    public function checkVersion(): ?string
    {
        $currentVersion = $_ENV['VERSION'];
        $latestVersion = null;
        $error = null;
        try {
            $latestVersion = file_get_contents('https://avenanceagency.com/clients/versions/isstourismeconsole.txt');
        } catch (\Exception $e) {
            $error = 'Impossible de déterminer la dernière version du système. Veuillez contacter l\'administrateur.';
        }
        if ($currentVersion < $latestVersion) {
            return <<<HTML
                <div class="alert alert-warning">Une nouvelle version du système est disponible, merci de vous rapprocher de l'administrateur afin d'effectuer la mise à jour.</div>
            HTML;
        }
        if ($error) {
            return <<<HTML
                <div class="alert alert-danger">$error</div>
            HTML;

        }
        return null;
    }

}