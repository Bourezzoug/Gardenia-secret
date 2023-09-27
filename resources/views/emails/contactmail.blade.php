<html>
<head>
<title>Sondage</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			min-width: 100% !important;
		}

		@media only screen and (min-device-width: 601px) {
			.content {
				width: 100%;
				max-width: 600px;
				margin: 0;
				padding: 0;
			}
		}
	</style>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Save for Web Slices (emailing-sondage.psd) -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
            
    <tbody><tr><td width="100%" align="center" valign="top" bgcolor="#eeeeee" height="20"></td></tr>
    <tr>
    <td bgcolor="#eeeeee" align="center" style="padding:0px 15px 0px 15px" >
        
                <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px" >
                    <tbody><tr>
                        <td>
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            
<tbody>
                            <tr>
                                <td align="center" style="padding:40px 40px 0px 40px">
                                    <a href="https://gardeniasecret.com/" target="_blank" >
                                        <img src="https://gardeniasecret.com/images/logo.png" width="150" border="0" style="vertical-align:middle">
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td align="center" style="font-size:18px;color:#0e0e0f;font-weight:700;font-family:Helvetica Neue;line-height:28px;vertical-align:top;text-align:center;padding:35px 40px 0px 40px">
                                    <strong>You've received message from {{ $firstName }} {{ $lastName }}</strong>
                                </td>
                            </tr>


                            <tr>
                                <td align="center" bgcolor="#ffffff" height="1" style="padding:40px 40px 5px" valign="top" width="100%">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="border-top:1px solid #e4e4e4">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td  style="font:16px/22px 'Helvetica Neue',Arial,'sans-serif';text-align:left;color:#555555;padding:40px 40px 0 40px">
                                    
                                    {{ $emailMessage }}

                                </td>
                            </tr>
                            <tr>
                                <td align="center" bgcolor="#ffffff" height="1" style="padding:40px 40px 5px" valign="top" width="100%">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td style="border-top:1px solid #e4e4e4">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td  style="font:16px/22px 'Helvetica Neue',Arial,'sans-serif';text-align:left;color:#555555;padding:40px 40px 0 40px">
                                    
                                    <p>The Personal Informations about the user :</p>
                                    <ul>
                                        <li>Nom Complet : {{ $firstName }} {{ $lastName }}</li>
                                        <li>Email : {{ $email }}</li>
                                        <li>Country : {{ $country }}</li>
                                        <li>City : {{ $city }}</li>
                                    </ul>

                                </td>
                            </tr>
                            


                            </tbody></table>
                        </td>
                    </tr>
                    
                    <tr><td width="100%" align="center" valign="top" bgcolor="#ffffff" height="45"></td></tr>

                </tbody></table>
                
    </td>
    </tr>

</tbody></table>
<!-- End Save for Web Slices -->
</body>
</html>