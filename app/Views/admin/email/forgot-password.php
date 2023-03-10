<?php $this->extend('admin/email/main'); ?>

<?php $this->section('content'); ?>

<table role="presentation" class="main">
    <tr>
        <td class="wrapper">
            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <p><?= lang('EmailTemplate.text.password_forgot_hello') ?> <?= $user->getFullName(); ?>,</p>
                        <p><?= lang('EmailTemplate.text.password_forgot_content') ?></p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                            <tbody>
                            <tr>
                                <td align="left">
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url(route_to('admin_forgot_verify', $user->getVerifyToken())); ?>" target="_blank">
                                                    <?= lang('EmailTemplate.text.password_forgot_button') ?>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <p><?= lang('EmailTemplate.text.password_forgot_alt_content') ?></p>
                        <p><?= lang('EmailTemplate.text.password_forgot_thanks') ?></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<?php $this->endSection(); ?>
