<?

if(post('submit')){
    if($data = form_control()){
        $row = $db->from('kullanici')
            ->where('kullanici_mail', ($data['kullanici_mail']))
            ->first();

        if (!$row){
            $error = 'Girdiğiniz bilgiler hatalı, lütfen kontrol edin.';
        } else {

            $password_verify = password_verify($data['kullanici_pass'], $row['kullanici_pass']);
            if ($password_verify){                        
                 $_SESSION['user_name'] = $row['kullanici_adsoyad'];
                 $_SESSION['user_mail'] = $data['kullanici_mail'];
                 $_SESSION['user_password'] = $data['kullanici_pass'];
                 
                 header('Location:' . site_url());
            } else {
                $error = 'Girdiğiniz şifre hatalı, lütfen kontrol edin.';
            }

        }
    }else {
        $error = 'Lütfen bilgileriniz girin.';
    }
}


require view('login');
