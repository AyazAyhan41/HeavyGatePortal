<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(1);
?>
<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getFirst() ?>"  aria-label="<?= lang('Pager.previous') ?>" tabindex="-1"><i class="mdi mdi-skip-backward-outline"></i></a>
            </li>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getPreviousPage() ?>"  aria-label="<?= lang('Pager.previous') ?>" tabindex="-1"><i class="mdi mdi-skip-previous-outline"></i></a>
        </li>
        <?php endif; ?>
        <?php foreach ($pager->links() as $link) : ?>
        <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
            <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
        </li>
        <?php endforeach; ?>
        <?php if ($pager->hasNextPage()) : ?>
        <li class="page-item">
            <a class="page-link" href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>"><i class="mdi mdi-skip-next-outline"></i></a>
        </li>
            <li class="page-item">
                <a class="page-link" href="<?= $pager->getLast() ?>"  aria-label="<?= lang('Pager.previous') ?>" tabindex="-1"><i class="mdi mdi-skip-forward-outline"></i></a>
            </li>
        <?php endif ?>
    </ul>
</nav>