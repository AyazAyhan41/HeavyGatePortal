<?php


namespace App\Libraries;


class EmailTo
{
    protected $email;
    protected $user;
    protected $posta;

    public function __construct()
    {
        $this->email = \Config\Services::email();
    }

    public function settings()
    {
        $this->email->initialize([
            'protocol' => 'smtp',
            'SMTPHost' => 'mail.devxyazilim.com',
            'SMTPUser' => 'rapor@heavygate.com.tr',
            'SMTPPass' => '163403So@',
            'SMTPPort' => '465',
            'SMTPTimeout' => '60',
            'SMTPCrypto' => 'ssl',
            'mailType' => 'html'
        ]);
        $this->email->setFrom('rapor@heavygate.com.tr','Heavygate Rapor Servis');
        return $this;
    }

    public function setUser($user)
    {
        $this->user = $user;
        $this->email->setTo($this->user->getEmail());
        return $this;
    }
    public function setposta($mailler)
    {
        $this->email->setTo($mailler);
        return $this;
    }

    public function accountVerify()
    {
        $this->email->setSubject('Hesabınızı Doğrulayın');
        $this->email->setMessage(view('admin/email/account-verify', ['user' => $this->user]));
        return $this;
    }

    public function accountVerifySuccess()
    {
        $this->email->setSubject('Hesabınız Doğrulandı');
        $this->email->setMessage(view('admin/email/account-verify-success', ['user' => $this->user]));
        return $this;
    }

    public function forgotPassword()
    {
        $this->email->setSubject('Şifre Sıfırlama Talebi');
        $this->email->setMessage(view('admin/email/forgot-password', ['user' => $this->user]));
        return $this;
    }

    public function passwordChangeSuccess()
    {
        $this->email->setSubject('Şifre Sıfırlama Talebi');
        $this->email->setMessage(view('admin/email/password-change-success', ['user' => $this->user]));
        return $this;
    }

    public function eprapor($mesaj)
    {

        $this->email->mailType = 'html';
        $this->email->setSubject('Envarter Planlama Raporu');
        $this->email->setMessage($mesaj);

        return $this;
    }

    public function faturalandirilmamissevkiyat($mesaj)
    {

        $this->email->mailType = 'html';
        $this->email->setSubject('Azak - Faturalandırılmamış Sevkiyat Raporu');
        $this->email->setMessage($mesaj);

        return $this;
    }

    public function otuzGunUzeri($mesaj)
    {

        $this->email->mailType = 'html';
        $this->email->setSubject('AZAK - OTUZ GÜN ÜZERİ AÇIK OLAN İŞ ERMİRLERİ');
        $this->email->setMessage($mesaj);

        return $this;
    }

    public function send()
    {
        return $this->email->send();
    }


}