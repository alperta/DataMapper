<?php

require_once __DIR__ . '/EnhanceTestFramework.php';

\Enhance\Core::discoverTests('.');

\Enhance\Core::runTests();