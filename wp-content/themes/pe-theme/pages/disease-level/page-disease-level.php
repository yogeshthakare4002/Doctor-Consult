<?php
/**
 * Disease Level page layout partial.
 * Appears inside the shared main container.
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="disease-level-content">
    Disease Level
</section>

<style>
.disease-level-page .disease-level-content {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 48px;
}

.disease-level-page .conditions-grid {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 24px;
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    justify-content: center;
}

@media (max-width: 767px) {
    .disease-level-page .conditions-grid {
        padding: 0 12px;
        gap: 12px;
    }
}
</style>
