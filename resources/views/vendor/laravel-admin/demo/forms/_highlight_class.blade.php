@php
$class = $class ?? null;
if (!$class) {
    echo '<div class="text-warning">No class provided.</div>';
} else {
    try {
        if (class_exists($class)) {
            $ref = new \ReflectionClass($class);
            $file = $ref->getFileName();
            if ($file && file_exists($file)) {
                echo '<pre class="overflow-auto"><code>';
                echo highlight_file($file, true);
                echo '</code></pre>';
            } else {
                echo '<div class="text-warning">Source file not found for class: ' . e($class) . '</div>';
            }
        } else {
            echo '<div class="text-warning">Class not found: ' . e($class) . '</div>';
        }
    } catch (\ReflectionException $e) {
        echo '<div class="text-error">Error reflecting class ' . e($class) . ': ' . e($e->getMessage()) . '</div>';
    }
}
@endphp
