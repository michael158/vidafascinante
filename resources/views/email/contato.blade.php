<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
</head>

<body>

<center>
    <table align="center" style="border-collapse:collapse;height:100%;margin:0;padding:0;width:100%;background-color:#eaeaea">
        <tbody>
        <tr>
            <td align="center" valign="top" style="height:100%;margin:0;padding:20px;width:100%;font-family:Helvetica,Arial,sans-serif;">
                <table style="border-collapse:collapse;width:90%;background-color:#ffffff;border:1px solid #d9d9d9">
                    <tbody>
                    <tr>
                        <td align="center" valign="top" style="font-family:Helvetica,Arial,sans-serif">
                            <table align="center" width="100%" style="border-collapse:collapse">
                                <tbody>
                                <tr>
                                    <td align="center" style="background-color:#ffffff;font-family:Helvetica,Arial,sans-serif;line-height:160%;padding-top:20px">
                                        <a href="http://vidafascinante.com" target="_blank"><img src="{{$message->embed(base_path('../img/logo-4.png'))}}" alt="Vida Fascinante" width="200" style="border:0;line-height:100%;outline:none;text-decoration:none;max-width:180px;width:180px">
                                        </a>
                                        <hr style="width:100%;border:0;margin-top:20px;border-top:1px solid #eaeaea">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-family:Helvetica,Arial,sans-serif;line-height:160%;color:#404040;font-size:16px;padding-top:10px;padding-bottom:10px;padding-right:8%;padding-left:8%;background:#ffffff">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;background-color:#ffffff">
                                <tbody>
                                <tr>
                                    <td valign="top" style="font-family:Helvetica,Arial,sans-serif;line-height:160%;text-align:center">
                                        <h2 style="font-family:Helvetica,Arial,sans-serif;font-style:normal;font-weight:bold;line-height:100%;color:#404040;">Novo Contato! </h2>
                                        <h4>Olá</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td valign="top" style="font-family:Helvetica,Arial,sans-serif;line-height:160%;text-align:center">
                                        <p style="text-align: center;"><span style="text-transform: capitalize; color:#0d9890" ><b>{{ $name }}</b> </span> te enviou esse email atraves do blog</p>
                                        <p style="text-align: center;">O email do(a) <span style="text-transform: capitalize; color:#0d9890"><b>{{ $name }}</b></span> é : <b>{{ $email }}</b></p>
                                        <p style="text-align: center;"><b>Mensagem enviada:</b></p>
                                        <p style="text-align: center;"> "{{ $mensagem }}"</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-family:Helvetica,Arial,sans-serif;line-height:160%;background:#ffffff">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;background-color:#ffffff">
                                <tbody>
                                <tr>
                                    <td align="center" style="font-family:Helvetica,Arial,sans-serif;line-height:160%;padding-bottom:8px;text-align:center">
                                        <p style="color:#828080;font-size: 12px">{{ date('Y') }} © - Todos os direitos reservados</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</center>
</body>
</html>