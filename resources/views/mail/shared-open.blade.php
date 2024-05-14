<table class="email-wraper">
    <tbody>
        <tr>
            <td class="py-5">
                <table class="email-header">
                    <tbody>
                        <tr>
                            <td class="text-center pb-4">
                                <a href="#">
                                    <img class="email-logo" src="/demo3/images/logo-dark2x.png" alt="logo">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="email-body text-center">
                    <tbody>
                        <tr>
                            <td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-4">
                                <img class="w-100px" src="/demo3/images/email/kyc-progress.png" alt="In Process">
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 px-sm-5 pb-3 pb-sm-5">
                                <h5 class="text-primary mb-3">Доступ к файлу "{{ $file_name }}"</h5>
                                <p>Не пересылайте это письмо и не отправляйте ссылку и пароль в одном письме!</p>
                                <p>Пароль: {{ $password }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
