<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerRfoUHpG\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerRfoUHpG/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerRfoUHpG.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerRfoUHpG\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerRfoUHpG\App_KernelDevDebugContainer([
    'container.build_hash' => 'RfoUHpG',
    'container.build_id' => '653f5f23',
    'container.build_time' => 1714300994,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerRfoUHpG');