<nav>
    <ul class="pagination pagination-sm justify-content-end mb-0">

        <!-- Previous -->
        <?php if ($pager->hasPrevious()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getPreviousPageURI() ?>">
                    ‹
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">‹</span>
            </li>
        <?php endif; ?>

        <!-- Number -->
        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- Next -->
        <?php if ($pager->hasNext()): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getNextPageURI() ?>">
                    ›
                </a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">›</span>
            </li>
        <?php endif; ?>

    </ul>
</nav>