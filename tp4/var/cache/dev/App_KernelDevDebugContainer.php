<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container8fXXz2i\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container8fXXz2i/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container8fXXz2i.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container8fXXz2i\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container8fXXz2i\App_KernelDevDebugContainer([
    'container.build_hash' => '8fXXz2i',
    'container.build_id' => '95269c76',
    'container.build_time' => 1714216274,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'Container8fXXz2i');