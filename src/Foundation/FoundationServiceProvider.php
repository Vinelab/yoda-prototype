<?php

namespace Sample\Foundation;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * The service provider for the foundation.
 *
 * @category Provider
 *
 * @author   Abed Halawi <abed.halawi@vinelab.com>
 */
class FoundationServiceProvider extends ServiceProvider
{

    protected $baseNamespace = 'Sample\\';

    public function register()
    {
        // go into each Applications's first level directory and register every service provider in there
        $finder = new Finder();
        $directories = $finder->in(__DIR__ . '/../Applications')->depth('== 1');

        $this->registerServiceProvidersInDirectories($directories);
        $this->loadRoutesInDirectories($directories);
        $this->loadViewsInDirectories($directories);

        $this->app->singleton('Sample\Foundation\TransporterInterface', 'Sample\Foundation\Transporter');
    }

    /**
     * Register the service providers in the given directorie(s).
     * It will search through the directories at the root level for
     * files with their names ending with "ServiceProvider.php".
     *
     * @param Symfony\Component\Finder\Finder $directories
     */
    protected function registerServiceProvidersInDirectories(Finder $directories)
    {
        $files = $directories->files()->name('*ServiceProvider.php');
        // go through the directories inside the Applications directory
        foreach ($files as $file) {
            /**
             * @todo get the namespace from somewhere else.
             * @todo Get the namespace out of the file itself (if possible).
             */
            if ($namespace = $this->getServiceProviderNamespace($file)) {
                $this->app->register($namespace);
            }
        }
    }

    /**
     * Load the routes files from the given directories.
     *
     * @param \Symfony\Component\Finder\Finder $directories
     */
    protected function loadRoutesInDirectories(Finder $directories)
    {
        // make the $app variable available for the routes we require
        $app = $this->app;
        // go through the matching files ending with routes.php
        $files = $directories->files()->name('*routes.php')->depth('== 2');
        foreach ($files as $file) {
            require $file->getPathName();
        }
    }

    /**
     * Add the location of the views folder inside each app.
     *
     * @param  \Symfony\Component\Finder\Finder $finder
     */
    protected function loadViewsInDirectories(Finder $finder)
    {
        $view = $this->app['view'];
        $directories = $finder->directories()->name('views')->depth('== 2');
        foreach ($directories as $directory) {
            $view->addLocation($directory->getPathName());
            // get the parent of the parent directory, namely the app directory such as '[app]/resources/views'
            /** @todo support camelCase to show as camel-case in namespace */
            $namespace = $directory->getPathInfo()->getPathInfo()->getBaseName();
            $view->addNamespace($namespace, $directory->getPathName());
        }
    }

    /**
     * Get the fully qualified namespace for the service provider class.
     *
     * @param \Symfony\Component\Finder\SplFileInfo $directory
     * @param \Symfony\Component\Finder\SplFileInfo $file
     *
     * @return string
     */
    protected function getServiceProviderNamespace(SplFileInfo $file)
    {
        $parentDirectory = $this->getParentDirectoryForFile($file);

        return $this->baseNamespace . 'Applications\\' . $parentDirectory . '\\' . str_replace('.php', '',
            $file->getBaseName());
    }

    /**
     * Get the parent directory of the given file instance.
     *
     * @param \Symfony\Component\Finder\SplFileInfo $file
     *
     * @return string
     */
    protected function getParentDirectoryForFile(SplFileInfo $file)
    {
        return $file->getPathInfo()->getBaseName();
    }
}
