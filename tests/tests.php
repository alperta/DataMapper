<?php

require_once __DIR__ . '/EnhanceTestFramework.php';

\Enhance\Core::discoverTests('.', true);

\Enhance\Core::runTests();